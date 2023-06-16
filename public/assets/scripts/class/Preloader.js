/**
 * Hide or show icons for preloader
 */
class Preloader{
    /**
     * @since 1.0.0
     * 
     * @param {object} event 
     */
    static habilit(event){
        const boxPreloader = $('#box-preloader');

        if(event.target.checked){
            boxPreloader.slideDown();
        }else{
            boxPreloader.slideUp();
        }
    }
}
