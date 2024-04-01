'use strict';

class ValidateForm{
    constructor(){
        this.fields = document.querySelectorAll('[required]');
    }

    init(){
        for(let field of this.fields){
            field.addEventListener('invalid', (event) => {
                event.preventDefault();
                this.customValidation(event);
            });

            if($(field).attr('type') !== 'checkbox' || $(field).attr('type') !== 'radio'){
                field.addEventListener('blur', (event) => this.customValidation(event));
            }
        }
    }

    customValidation(event){
        let field = event.target;
        this.validateField(field);
    }

    validateField(field){
        const error = this.verifyError(field);

        if(error){
            const message = this.customMessage(error, field);

            this.setCustomMessage(message, field);
        }else{
            this.setCustomMessage(false, field);
        }
    }

    verifyError(field){
        let foundError = false;

        for(let error in field.validity){
            if(field.validity[error] && !field.validity.valid){
                foundError = error;
            }
        }

        return foundError;
    }

    customMessage(typeError, field){
        const valueMissing = this.getMessage('valueMissing');

        const message = {
            text: {
                valueMissing: valueMissing
            },
            email: {
                valueMissing: valueMissing,
                typeMismatch: this.getMessage('typeMismatch')
            }
        }

        if(message[field.type]){
            return message[field.type][typeError];
        }else{
            return valueMissing;
        }
    }

    setCustomMessage(message, field){
        if(field){
            const spanError = field.parentNode.querySelector('span.validit');

            if(message){
                $(spanError).html(`${message} <i class="bi bi-x-circle-fill"></i>`);
                $(spanError).attr('data-valid', 'false')
            }else{
                $(spanError).html('Válido! <i class="bi bi-check-circle-fill"></i>');
                $(spanError).attr('data-valid', 'true')
            }
        }
    }

    validatePhoneNotEmpty(phoneId){
        document.getElementById(phoneId).addEventListener('input', (event) => {
            const phone = event.target;

            if(phone.value == ''){
                phone.required = false;
                phone.classList.add('telefone');
            }else{
                phone.required = true;
                phone.classList.remove('telefone');
            }
        });
    }

    getMessage(typeMessage){
        const messages = {
            valueMissing: 'Por favor, preencha este campo!',
            typeMismatch: 'Por favor, digite um email válido!',
            formSentFailed: "Houve um erro inesperado ao realizar o envio!"
        }

        return messages[typeMessage];
    }
}
