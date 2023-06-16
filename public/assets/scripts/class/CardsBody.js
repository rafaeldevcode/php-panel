class CardsBody{
    static changeVisible(){
        document.querySelectorAll('.data-card-safe-header').forEach((button) => {
            $(button).click((event) => {
                const button = $(event.target);
                const body = button.parent().find('[data-card-safe="body"]');

                if(button.attr('data-card-safe-header') && button.attr('data-card-safe-header') == 'true'){
                    button.attr('data-card-safe-header', false);
                    body.slideUp();
                }else{
                    this.hideAll(body.attr('data-card-safe-id'));
                    
                    button.attr('data-card-safe-header', true);
                    body.slideDown();
                }
            });
        });
    }

    static hideAll(id){
        document.querySelectorAll('[data-card-safe="body"]').forEach((item) => {
            // if(id !== $(item).attr('data-card-safe-id')){
            //     $(item).slideUp();
            // }
            $(item).slideUp();
            $(item).parent().find('button').attr('data-card-safe-header', false);
        });
    }
}
