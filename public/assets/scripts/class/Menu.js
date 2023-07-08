'use strict';

/**
 * Open and close menu, client and admin pages
 */
class Menu{
    /**
     * Open and close menu admin
     * 
     * @since 1.0.0
     * 
     * @param {object} element 
     * @return {void}
     */
    static admin(element){
        element.click((event) => {
            const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
            const menu = $('#menu');
            const aside = $('aside');
            const items = document.querySelectorAll('div[data-item-active]');
            const divBtn = $('#divClosed');
        
            if(width <= 750){
        
                if(event.target.checked){
                    menu.addClass('menuMobileOppen');
        
                    aside.attr('data-expanded', 'mobile-active');
                    divBtn.addClass('divClosed');
                    divBtn.attr('data-divbtn-closed', 'active');
        
                }else{
                    menu.removeClass('menuMobileOppen');
                    divBtn.attr('data-divbtn-closed', 'desactive');
        
                    document.getElementById('checkbox-menu').checked = false;
        
                    setTimeout(()=>{
                        aside.attr('data-expanded', 'mobile-desactive');
                        divBtn.removeClass('divClosed');
                    }, 200);
                }
            }else{
        
                if(event.target.checked){
                    aside.attr('data-expanded', 'active');
        
                    items.forEach((item)=>{
                        item.parentNode.querySelector('i').classList.remove('iconManu');
        
                        $(item).removeClass('dNone');
                        $(item).attr('data-item-active', 'true');
                    });
                }else{
                    aside.attr('data-expanded', 'desactive');
        
                    items.forEach((item)=>{
                        $(item).attr('data-item-active', 'false');
        
                        setTimeout(()=>{
                            item.parentNode.querySelector('i').classList.add('iconManu');
        
                            $(item).addClass('dNone');
                        }, 600);
                    });
                }
            }
        });
    }

    /**
     * Open and close menu client
     * 
     * @since 1.0.0
     * 
     * @returns {void}
     */
    static client(){
        $('#checkbox-menu').click((event) => {
            const nav = $(event.target).parent().parent().parent().find('nav');
            const ul = nav.find('ul');
    
            if(event.target.checked){
                nav.css('display', 'block');
                nav.attr('data-navclient-active', 'true');
                ul.attr('data-expanded-client', 'ative');
                $(event.target).parent().parent().addClass('fixed-close-menu');
            }else{
        
                nav.attr('data-navclient-active', 'false');
                ul.attr('data-expanded-client', 'inative');
                $(event.target).parent().parent().removeClass('fixed-close-menu');
                    
                setTimeout(() => {
                    nav.css('display', 'none');
                }, 200);
            }
        });
    }

    /**
     * Remove link class from client menu items
     * 
     * @since 1.0.0
     * 
     * @returns {void}
     */
    static removeClassLinksNavbar(){
        const itemsMenu = $('.navbar-client');
        const lis = itemsMenu.find('li');
    
        lis.each((index, element) => {
            const br = $(element).find('br');
            const textCenter = $(element).attr('class').indexOf('text-center');
    
            if(br){
                br.remove();
            }
    
            if(textCenter > -1){
                $(element).removeClass('text-center');
            }
        });
    }
}
