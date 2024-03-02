'use strict';

class Preloader{
    static hide(type){
        $(`[data-preloader="${type}"]`).removeClass('flex');
        $(`[data-preloader="${type}"]`).hide();
    }

    static show(type){
        $(`[data-preloader="${type}"]`).addClass('flex');
        $(`[data-preloader="${type}"]`).show();
    }

    static habilit(event){
        const boxPreloader = $('#box-preloader');

        if(event.target.checked){
            boxPreloader.slideDown();
        }else{
            boxPreloader.slideUp();
        }
    }
}
