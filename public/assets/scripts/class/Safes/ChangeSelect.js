class ChangeSelect{
    static changeState(elements, state, exept){
        elements.forEach((element) => {
            if(exept){
                exept.forEach((exept) => {
                    const exeptArray = exept.split('=');
                    const attr = $(element).attr(exeptArray[0]);
        
                    if(!attr|| attr !== exeptArray[1]){
                        if(state){
                            $(element).slideUp();
                        }else{
                            $(element).slideDown();
                        }
                    }
                });
            }else{
                if(state){
                    $(element).slideUp();
                }else{
                    $(element).slideDown();
                }
            }
        });
    }

    static changeRequired(elements, value){
        elements.forEach((item) => {
            if($(item).attr('data-required') == 'true'){
                const names = [];
                const inputs = $(item).find('input');
                const selects = $(item).find('select');
                const textAreas = $(item).find('textarea');
    
                inputs.push(selects);
                inputs.push(textAreas);
    
                for (let i = 0; i < inputs.length; i++) {
                    if(!names.includes($(inputs[i]).attr('name'))){
                        names.push($(inputs[i]).attr('name'));
                        $(inputs[i]).attr('required', value);
                    }
                }
            }
        });
    
        const validate = new ValidateForm();
        validate.init();
    }

    static changeInputsRadio(inputSelector, dataSelector){
        const inputs = document.querySelectorAll(inputSelector);
        const inputsHidden = document.querySelectorAll(dataSelector);
    
        inputs.forEach((input) => {
            $(input).click((event) => {
                if(event.target.value === 'Sim'){
    
                    this.changeState(inputsHidden, false, null);
                    this.changeRequired(inputsHidden, true);
                }else{
    
                    this.changeState(inputsHidden, true, null);
                    this.changeRequired(inputsHidden, false);
                }
            });
        });
    }
}
