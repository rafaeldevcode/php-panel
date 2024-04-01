'use strict';

class Modal{
    static init(){
        $("[data-toggle]").on('click', (event) => {
            this.open($(event.target).attr("data-toggle"));
        });
    }

    static open(selector){
        const modal = $(`[data-modal="${selector}"]`);

        modal.removeClass('hidden');
        modal.addClass('flex');
        modal.attr('data-modal-content', true);

        this.clickClose(modal);
    }

    static clickClose(modal){
        modal.find('[data-modal-close]').on('click', () => {
            modal.attr('data-modal-content', false);

            setTimeout(() => {
                modal.removeClass('flex');
                modal.addClass('hidden');
            }, 900);
        });
    }

    static close(selector)
    {
        const modal = $(`[data-modal="${selector}"]`);

        modal.removeClass('flex');
        modal.addClass('hidden');
    }
}
