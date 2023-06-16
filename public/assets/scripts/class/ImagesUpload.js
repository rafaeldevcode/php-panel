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
     * @returns {void}
     */
    changeAttributes(element) {
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
}
