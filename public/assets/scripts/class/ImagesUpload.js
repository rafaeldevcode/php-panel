'use strict';

/**
 * Remove or add image preview when uploading
 */
class ImagesUpload{
    /**
     * @since 1.0.0
     * 
     * @returns {void}
     */
    constructor(){
        this.filesClose = document.querySelectorAll('[data-file-image="close"]');
    }

    /**
     * @since 1.0.0
     * 
     * @param {object} element 
     * @param {object} selectCount 
     * @returns {void}
     */
    changeAttributes(element, selectCount) {
        element.change((event) => {
            const file = event.target.files[0];
            const image = $(event.target).parent().find('label > img');
            const srcOld = image.attr('src');
            const reader = new FileReader();
    
            reader.onload = ((theFile) => {
                return (event) => {
                    image.attr('src', event.target.result);
                    image.attr('title', escape(theFile.name));
    
                    if(!image.attr('data-old')){
                        image.attr('data-old', srcOld);
                    }
                };
            })(file);
    
            reader.readAsDataURL(file)
            selectCount.text('1 arquivo selecionado');
        });
    }
    
    /**
     * @since 1.0.0
     * @returns {void}
     */
    remove(){
        this.filesClose.forEach((close) => {
            $(close).click((event) => {
                const click = $(event.target).attr('data-file-image') ? $(event.target) : $(event.target).parent();
                const image = click.parent().find('label > img');
                const input = click.parent().find('input');
    
                if(image.attr('data-old')){
                    input.val('');
                    image.attr('src', image.attr('data-old'));
                }else{
                    image.attr('src', `/public/${input.attr('data-default')}`);
    
                    // const myFile = new File(['Imagem padrão'], 'no_image.png', {
                    //     type: 'image/png',
                    //     lastModified: new Date(),
                    // });
    
                    // const dataTransfer = new DataTransfer();
                    // dataTransfer.items.add(myFile);
                    // input.files = dataTransfer.files;
                }
            });
        });
    }

    /**
     * @since 1.0.0
     * @param {object} element 
     * @returns {string}
     */
    save(element){
        element.val('');

        return new Promise((resolve, reject) => {
            element.change((event) => {
                const file = event.target;

                if(file && file.files[0]){
                    const formData = new FormData();
        
                    formData.append('image', file.files[0]);
        
                    $.ajax({
                        url: '/image-upload.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            const path = response.file_path;
                            resolve(path);
                        },
                        error: function(xhr, status, error) {
                            reject(error);
                        }
                    });
                }
            });
        });
    }

    /**
     * @since 1.0.0
     * @param {Object}
     * @returns {void}
     */
    severalUploads(element, selectCount){
        element.change((event) => {
            $('#gallery').html('');
            const message = event.target.files.length > 1 ? ' arquivo selecionado' : ' arquivos selecionados';

            for (let i = 0; i < event.target.files.length; i++) {
                const file = event.target.files[i];
                const reader = new FileReader();
        
                reader.onload = ((theFile) => {
                    return (event) => {
                        const div = $('<div />');
                        div.attr('class', 'm-2 article-gallery');

                        const input = $('<input />');
                        input.attr({
                            type: 'radio',
                            hidden: true,
                            name: 'thumbnail',
                            id: `thumbnail_${theFile.name}`,
                            value: theFile.name
                        });
                        input.attr('data-checked', 'add-style');
                        div.append(input);

                        const label = $('<label />');
                        label.attr({
                            class: 'form-check-label rounded pointer border border-cm-secondary p-1',
                            for: `thumbnail_${theFile.name}`
                        });

                        const image = $('<img />');
                        image.attr({
                            class: 'w-100 rounded',
                            src: event.target.result,
                            alt: escape(theFile.name)
                        });

                        label.append(image);
                        div.append(label);

                        $('#gallery-title').text('Selecione uma das imagens para ficar em destaque.');
                        $('#gallery').append(div);
                    };
                })(file);
        
                reader.readAsDataURL(file)
                selectCount.text(event.target.files.length+message);
            };
        });

        // $('body').scrollIntoView({ behavior: 'smooth', block: 'end' });
    }
}
