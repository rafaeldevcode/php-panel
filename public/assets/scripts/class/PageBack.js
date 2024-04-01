'use strict';

class PageBack{
    static init(element = '#back'){
        const pageBack = $(element);
    
        if(pageBack){
            pageBack.click((event)=>{
                event.preventDefault();
    
                history.back();
            });
        }
    }
}
