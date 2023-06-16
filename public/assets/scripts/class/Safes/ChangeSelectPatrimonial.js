class ChangeSelectPatrimonial extends ChangeSelect{
    static useProperty(event){
        const value = event.target.value;
        const inputsMixed = document.querySelectorAll('[data-use-property="Misto"]');
        
        switch (value) {
            case 'Misto':
                
                this.changeState(inputsMixed, false, null);
                this.changeRequired(inputsMixed, true);
                break;
        
            default:

                this.changeState(inputsMixed, true, null);
                this.changeRequired(inputsMixed, false);
                break;
        }
    }

    static typeSafePatrimonial(event){
        const value = event.target.value;
        const inputsSafeEngineering = document.querySelectorAll('[data-type-safe="GRUPO. 1 IDENT. 67"]');
        const inputsSafeResidential = document.querySelectorAll('[data-type-safe="GRUPO. 1 IDENT. 14"]');
        const inputsSafeCondominium = document.querySelectorAll('[data-type-safe="GRUPO. 1 IDENT. 16"]');
        const inputsSafeCompany = document.querySelectorAll('[data-type-safe="GRUPO. 1 IDENT. 18"]');
        const inputsSafeOthers = document.querySelectorAll('[data-type-safe="Outros"]');
        const inputsMixed = document.querySelectorAll('[data-use-property="Misto"]');
        const inputsInsurrenceRequest = document.querySelectorAll('[data-insurance-request="Renovação de seguro"]');

        const safetyEquipment = document.querySelectorAll('[data-input-radio="has_safety_equipment"]');
        const hasIsopanel = document.querySelectorAll('[data-input-radio="has_isopanel"]');
        const hasCurrentInsurance = document.querySelectorAll('[data-input-radio="has_current_insurance"]');
        const hasEfficientUseWater = document.querySelectorAll('[data-input-radio="has_efficient_use_water"]');

        switch (value) {
            case 'GRUPO. 1 IDENT. 67':
                this.changeState(inputsSafeEngineering, false, null);

                this.changeState(inputsSafeResidential, true, null);
                this.changeRequired(inputsSafeResidential, false);

                this.changeState(inputsSafeCondominium, true, null);
                this.changeRequired(inputsSafeCondominium, false);

                this.changeState(inputsSafeCompany, true, null);
                this.changeRequired(inputsSafeCompany, false);

                this.changeState(inputsSafeOthers, true, null);
                this.changeRequired(inputsSafeOthers, false);
                break;
        
            case 'GRUPO. 1 IDENT. 12':
            case 'GRUPO. 1 IDENT. 41':
            case 'GRUPO. 1 IDENT. 71':
            case 'GRUPO. 1 IDENT. 95':
            case 'GRUPO. 1 IDENT. 96':
            case 'GRUPO. 1 IDENT. 11':
            case 'GRUPO. 1 IDENT. 15':
                this.changeState(inputsSafeEngineering, true, null);

                this.changeState(inputsSafeResidential, true, null);
                this.changeRequired(inputsSafeResidential, false);

                this.changeState(inputsSafeCondominium, true, null);
                this.changeRequired(inputsSafeCondominium, false);

                this.changeState(inputsSafeCompany, true, null);
                this.changeRequired(inputsSafeCompany, false);
                
                this.changeState(inputsSafeOthers, false, null);
                this.changeRequired(inputsSafeOthers, true);
                break;

            case 'GRUPO. 1 IDENT. 14':
                this.changeState(inputsSafeEngineering, true, null);

                this.changeState(inputsSafeResidential, false, null);
                this.changeRequired(inputsSafeResidential, true);

                this.changeState(inputsSafeCondominium, true, null);
                this.changeRequired(inputsSafeCondominium, false);

                this.changeState(inputsSafeCompany, true, null);
                this.changeRequired(inputsSafeCompany, false);

                this.changeState(inputsSafeOthers, false, null);
                this.changeRequired(inputsSafeOthers, true);
                break;

            case 'GRUPO. 1 IDENT. 16':
                this.changeState(inputsSafeEngineering, true, null);

                this.changeState(inputsSafeResidential, true, null);
                this.changeRequired(inputsSafeResidential, false);

                this.changeState(inputsSafeCondominium, false, null);
                this.changeRequired(inputsSafeCondominium, true);

                this.changeState(inputsSafeCompany, true, null);
                this.changeRequired(inputsSafeCompany, false);

                this.changeState(inputsSafeOthers, false, null);
                this.changeRequired(inputsSafeOthers, true);
                break;

            case 'GRUPO. 1 IDENT. 18':
                this.changeState(inputsSafeEngineering, true, null);

                this.changeState(inputsSafeResidential, true, null);
                this.changeRequired(inputsSafeResidential, false);

                this.changeState(inputsSafeCondominium, true, null);
                this.changeRequired(inputsSafeCondominium, false);

                this.changeState(inputsSafeCompany, false, null);
                this.changeRequired(inputsSafeCompany, true);

                this.changeState(inputsSafeOthers, false, null);
                this.changeRequired(inputsSafeOthers, true);
                break;

            case 'GRUPO. 1 IDENT. 73':
                this.changeState(inputsSafeEngineering, true, null);

                this.changeState(inputsSafeResidential, true, null);
                this.changeRequired(inputsSafeResidential, false);

                this.changeState(inputsSafeCondominium, true, null);
                this.changeRequired(inputsSafeCondominium, false);

                this.changeState(inputsSafeCompany, true, null);
                this.changeRequired(inputsSafeCompany, false);

                this.changeState(inputsSafeOthers, true, null);
                this.changeRequired(inputsSafeOthers, false);
                break;
            default:
                break;
        }

        this.changeState(inputsMixed, true, null);
        this.changeRequired(inputsMixed, false);

        this.changeState(inputsInsurrenceRequest, true, null);
        this.changeRequired(inputsInsurrenceRequest, false);

        this.changeState(safetyEquipment, true, null);
        this.changeRequired(safetyEquipment, false);

        this.changeState(hasIsopanel, true, null);
        this.changeRequired(hasIsopanel, false);

        this.changeState(hasCurrentInsurance, true, null);
        this.changeRequired(hasCurrentInsurance, false);

        this.changeState(hasEfficientUseWater, true, null);
        this.changeRequired(hasEfficientUseWater, false);
    }

    static changePolicy(selectorClick, dataSelector, optionOne, optionTwo){
        const inputs = document.querySelectorAll(selectorClick);
        const inputsRenew = document.querySelectorAll(`[${dataSelector}="${optionOne}"]`);
        const inputsNew = document.querySelectorAll(`[${dataSelector}="${optionTwo}"]`);
    
        inputs.forEach((input) => {
            $(input).click((event) => {
                if(event.target.value === optionOne){
    
                    this.changeState(inputsRenew, false, null);
                    this.changeRequired(inputsRenew, true);

                    this.changeState(inputsNew, true, null);
                    this.changeRequired(inputsNew, false);
                }else{
    
                    this.changeState(inputsRenew, true, null);
                    this.changeRequired(inputsRenew, false);

                    this.changeState(inputsNew, false, null);
                    this.changeRequired(inputsNew, true);
                }
            });
        });
    }
}
