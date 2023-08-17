/**
 * Remove or add image preview when uploading
 */
class Gallery{
    /**
     * @since 1.2.0
     * 
     * @param {boolean} preloader
     * @returns {void}
     */
    constructor(preloader = true){
        this.inputType = null;
        this.inputName = null;
        this.preloader = preloader;
        this.currentClick = null;
        this.selected = [];
        this.currentPosition = 0;
        this.images = null;

        this.remove();
        this.loadMore();
    }

    /**
     * @since 1.2.0
     * 
     * @param {object} element 
     * @returns {Promise}
     */
    save(element){        
        element.val('');

        return new Promise((resolve, reject) => {
            element.change((event) => {
                if(this.preloader) Preloader.show();
                
                const file = event.target;
                const countFile = file.files.length;

                if(file && countFile > 0){
                    if(countFile <= 20){
                        const formData = new FormData();
        
                        for (let i = 0; i < file.files.length; i++) {
                            formData.append('images[]', file.files[i]);
                        }
            
                        $.ajax({
                            url: '/gallery.php',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                resolve(response);
                            },
                            error: function(xhr, status, error) {
                                reject(error);
                            }
                        });
                    }else{
                        Message.create('A quantidade máxima de arquivos permitidos para upload é de 20!', 'cm-danger');
                    }
                }
            });
        });
    }

    /**
     * @since 1.2.0
     * 
     * @param {int} page 
     * @param {string} search
     * @returns {Promise}
     */
    get(page, search){
        return new Promise((resolve, reject) => {
            const count = 30;
            const searchParam = search ? `&search=${search}` : '';
            
            $.ajax({
                url: `/gallery.php?page=${page}&count=${count}${searchParam}`,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(response) {
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error);
                }
            });
        });
    }

    /**
     * @since 1.2.0
     * 
     * @returns {void}
     */
    remove(){
        $('[data-upload-image="remove"]').click((event) => {
            const button = $(event.target).attr('data-upload-image') ? $(event.target) : $(event.target).parent();
            const input = button.parent().parent().parent().find('input');

            if(input.attr('required')){
                input.val('');
                button.parent().parent().fadeOut(400);

                setTimeout(() => {
                    button.parent().parent().remove();
                }, 400);
            }else{
                button.parent().parent().parent().fadeOut(400);

                setTimeout(() => {
                    button.parent().parent().parent().remove();
                }, 400);
            }
        });
    }

    /**
     * @since 1.3.0
     * 
     * @returns {void}
     */
    uploads() {
        $('#upload').click(async (event) => {
            event.preventDefault();

            $('#input-upload').click();
            const count = parseInt($('#count-images').text());
            // const displaying = parseInt($('#displaying-images').text());
            const response = await this.save($('#input-upload'));
        
            this.addImagesInGallery(response, true);
    
            $('#count-images').text(count+response.length);

            this.dbClickPreview();
            this.dbClickSelect();
            this.selectedFiles();
        });
    }

    /**
     * @since 1.3.0
     * 
     * @returns {void}
     */
    async loadMore(){
        $('[data-next-page]').click(async (event) => {
            if(this.preloader) Preloader.show();

            let page = parseInt($(event.target).attr('data-next-page'));
            const search = $(event.target).attr('data-search') && null ;
            const displaying = parseInt($('#displaying-images').text());
            const response = await this.get(page, search);
            
            this.addImagesInGallery(response[0], false);

            if(response[1][0].next === null){
                $(event.target).remove();
            }else{
                $(event.target).attr('data-next-page', response[1][0].next);
            }

            $('#displaying-images').text(displaying+response[0].length);

            this.dbClickPreview();
            this.dbClickSelect();
            this.selectedFiles();
        });
    }

    /**
     * @since 1.2.0
     * 
     * @param {string} inputType
     * @returns {void}
     */
    changeInputType(inputType) {
        this.inputType = inputType;
        this.inputName = inputType == 'radio' ? 'images' : 'images[]';

        document.querySelectorAll('#gallery > div').forEach((element) => {
            $(element).find('input').attr('type', this.inputType);
            $(element).find('input').attr('name', this.inputName);
        });

        this.inputType == 'radio' ? this.setSelectedRadioValue() : this.setSelectedCheckboxValues();
    }

    /**
     * @since 1.3.0
     * 
     * @param {object} element
     * @param {string} inputType
     * @returns {void}
     */
    openModalSelect(element, inputType) {        
        element.click((event) => {
            event.preventDefault();
            $('#modalGallery').modal('show');

            // Add input type 'radio' or 'checkbox'
            this.changeInputType(inputType);

            this.currentClick = $(event.target).attr('data-upload') 
                ? $(event.target).attr('data-upload') 
                : $(event.target).parent().attr('data-upload');

            this.uploads();
            this.dbClickSelect();
            this.selectedFiles();
        });
    }

    /**
     * @since 1.3.0
     * 
     * @param {object} response 
     * @returns {void}
     */
    addImagesInGallery(response, checked){
        response.forEach((res) => {
            const div = $('<div />');
            div.attr('class', 'm-2 gallery');
    
            const input = $('<input />');
            input.attr({
                type: this.inputType,
                hidden: true,
                name: 'images',
                id: `image_${res.id}`,
                value: res.id,
                checked: false
            });
            input.attr('data-checked', 'add-style');
            input.attr('data-id', res.id);
            input.attr('data-message-delete', 'Esta ação irá remover todas as imagens selecionados!');
            input.attr('data-button', 'delete-enable');
    
            div.append(input);
    
            const label = $('<label />');
            label.attr({
                class: 'form-check-label rounded pointer border border-cm-secondary p-1',
                for: `image_${res.id}`
            });
            label.attr('data-click', 'double');
    
            const image = $('<img />');
            image.attr({
                class: 'w-100 rounded',
                src: res.file_path,
                alt: res.name
            });
    
            label.append(image);
            div.append(label);
    
            $('#gallery').append(div);

            this.inputType == 'radio' ? this.setSelectedRadioValue() : this.setSelectedCheckboxValues();
            checked && input.click();
        });

        // Desabilit preloader
        if(this.preloader) Preloader.hide();

        // Habilit button remover items uploaded
        const remove = new Remove();
        remove.disableEnableButton();
    }

    /**
     * @since 1.3.0
     * 
     * @returns {void}
     */
    selectedFiles(){
        if(this.currentClick !== null){
            // Remove the first image if it is a checkbox and it is the first click
            // let countCurrentImages = $(`[data-upload-selected=${this.currentClick}]`).find('.m-2.gallery.rounded').length;

            $('#selected').click(() => {
                const inputName = this.inputType == 'radio' ? this.currentClick : `${this.currentClick}[]`;
                let required = $(`[data-upload-selected=${this.currentClick}]`).attr('data-required');
                (this.inputType == 'radio') && $(`[data-upload-selected=${this.currentClick}]`).html('');

                this.selected.forEach((selected) => {
                    const div = $('<div />');
                    div.attr('class', 'm-2 gallery rounded');

                    const input = $('<input />');
                    input.attr({
                        type: 'text',
                        hidden: true,
                        name: inputName,
                        value: selected.id
                    });

                    // Add required in input
                    if(required && required.length > 0) input.attr('required', required);

                    div.append(input);

                    const contentImage = $('<div />')
                    contentImage.attr('class', 'position-relative');
                    contentImage.attr('data-upload-image', 'selected');

                    const contentRemove = $('<div />');
                    contentRemove.attr('class', 'bg-color-main rounded-top d-flex justify-content-end p-1 w-100');

                    const button = $('<button />');
                    button.attr({
                        type: 'button',
                        title: 'Remover imagem',
                        class: 'border-0 bg-transparent p-0'
                    });
                    button.attr('data-upload-image', 'remove');

                    const i = $('<i />');
                    i.attr('class', 'bi bi-trash text-cm-danger');

                    button.append(i);
                    contentRemove.append(button);
                    contentImage.append(contentRemove);

                    const img = $('<img />');
                    img.attr({
                        class: 'w-100 rounded-bottom',
                        src: selected.url,
                        alt: selected.alt
                    });

                    contentImage.append(img);
                    div.append(contentImage);

                    if(required == 'required'){
                        const span = $('<span />');
                        span.attr('class', 'position-absolute start-0 top-0 mt-5 validit');

                        div.append(span);
                    }

                    $(`[data-upload-selected=${this.currentClick}]`).append(div);
                    const validate = new ValidateForm();
                    validate.init();

                    document.getElementById(`image_${selected.id}`).checked = false;
                });

                $('#modalGallery').modal('hide');
                this.currentClick = null;
                this.remove();

                // countCurrentImages = null;
            });

            this.selected = [];
        }
    }

    /**
     * @since 1.3.0
     * 
     * @returns {Promise}
     */
    selectedFilesTinymce(inputType){
        $('#modalGallery').modal('show');
        this.changeInputType(inputType);
        this.uploads();
        this.dbClickSelect();

        return new Promise((resolve) => {
            $('#selected').click(() => {
                resolve(this.selected);

                $('#modalGallery').modal('hide');
            });
        });
    }

    /**
     * @since 1.3.0
     * 
     * @returns {void}
     */
    setSelectedRadioValue() {
        $('input[type=radio]').click(() => {
            const selectedRadio = $('#gallery').find('input[type="radio"]:checked');

            if(selectedRadio.length > 0){
                const image = selectedRadio.parent().find('img');
                const data = {
                    url: image.attr('src'),
                    alt: image.attr('alt'),
                    id: selectedRadio.val()
                };
    
                this.selected = [];
                this.selected.push(data);
                $('#selected').attr('disabled', false);
            }
        });
    }

    /**
     * @since 1.3.0
     * 
     * @returns {void}
     */
    setSelectedCheckboxValues() {
        $('input[type="checkbox"]').click(() => {
            const selectedCheckboxes = document.querySelectorAll('#gallery input[type="checkbox"]:checked');

            if(selectedCheckboxes.length > 0){
                this.selected = [];

                selectedCheckboxes.forEach((input) => {
                    const image = $(input).parent().find('img');
    
                    const data = {
                        url: image.attr('src'),
                        alt: image.attr('alt'),
                        id: $(input).val()
                    };
        
                    this.selected.push(data);
                    $('#selected').attr('disabled', false);
                });
            }
        });
    }

    /**
     * @since 1.2.0
     * 
     * @returns {void}
     */
    dbClickSelect() {
        $('label[data-click="double"]').dblclick(() => {
            $('#selected').click();
            // this.currentClick = null;
        });
    }

    /**
     * @since 1.2.0
     * 
     * @returns {void}
     */
    dbClickPreview() {
        $('label[data-click="double"]').dblclick((event) => {
            this.images = this.extractInfoImage($('#gallery').find('img'));

            const image = $(event.target).attr('alt') ? $(event.target) : $(event.target).find('img');
            const imagePreview = $('#image-preview');

            this.setCurrentPosition(image.attr('src'));

            imagePreview.attr('src', image.attr('src'));
            imagePreview.attr('alt', image.attr('alt'));

            $('#name').text(image.attr('alt'));
            $('#url').text(image.attr('src'));

            $('#modalGalleryPreview').modal('show');
        });
    }

    /**
     * @since 1.2.0
     * 
     * @param {Object} imagePreview
     * @returns {void}
     */
    previous(imagePreview){
        $('#previous').click(() => {
            this.currentPosition = this.currentPosition === 0
                ? this.images.length-1
                : this.currentPosition-1;

            const nextImage = this.images[this.currentPosition];

            imagePreview.attr('src', nextImage.src);
            imagePreview.attr('alt', nextImage.alt);

            $('#name').text(nextImage.alt);
            $('#url').text(nextImage.src);
        });
    }

    /**
     * @since 1.2.0
     * 
     * @param {object} imagePreview
     * @returns {void}
     */
    next(imagePreview){
        $('#next').click(() => {
            this.currentPosition = this.currentPosition === this.images.length-1 
                ? 0
                : this.currentPosition+1;

            const nextImage = this.images[this.currentPosition];

            imagePreview.attr('src', nextImage.src);
            imagePreview.attr('alt', nextImage.alt);

            $('#name').text(nextImage.alt);
            $('#url').text(nextImage.src);
        });
    }

    /**
     * @since 1.2.0
     * 
     * @param {object} images 
     * @returns {object} 
     */
    extractInfoImage(images){
        const imagesObj = [];

        for(let i = 0; i < images.length; i++){
            const imageObj = {
                id: i,
                src: images[i].src,
                alt: images[i].alt
            }

            imagesObj.push(imageObj);
        }

        return imagesObj;
    }

    /**
     * @since 1.2.0
     * 
     * @param {string} id
     * @returns {void}
     */
    setCurrentPosition(id){
        const currentImage = this.images.filter((image) => {
            return image.src === id ? true : false;
        });

        this.currentPosition = currentImage[0].id;
    }
}
