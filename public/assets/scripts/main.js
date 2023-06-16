// Alterar o tipo seguro - empresarial|familiar
function typeSafe(event){
    const value = event.target.value;
    const enterprise = document.querySelectorAll('[data-safe-type="Empresarial"]');
    const all = document.querySelectorAll('[data-safe-type="Todos"]');
    const familly = document.querySelectorAll('[data-safe-type="Familiar"]');
    const numberInsuredAbove = document.querySelectorAll('[data-number-insured="above-100"]');
    const numberInsuredBelow = document.querySelectorAll('[data-number-insured="below-100"]');
    const prevoiusPlan = document.querySelectorAll('[data-previous-plan="hidden"]');

    // Verificar se o input de plano anterior está ativado
    if($("input:radio[name=previous_plan]:checked")[0]){
        alterState(document.querySelectorAll('[data-previous-plan="hidden"]'), true, null);
        $("input:radio[name=previous_plan]:checked")[0].checked = false;
    }

    if($("input:radio[name=form_contracting_plan]:checked")[0]){
        alterState(document.querySelectorAll('[data-previous-plan="hidden"]'), true, null);
        $("input:radio[name=form_contracting_plan]:checked")[0].checked = false;
    }

    switch (value) {
        case 'Empresarial':
            alterState(all, false, null);
            alterState(enterprise, false, null);
            alterState(familly, true, null);

            addOrRemoveHidden(enterprise, true);
            addOrRemoveHidden(familly, false);
            break;
    
        case 'Familiar':
            alterState(all, false, null);
            alterState(enterprise, true, null);
            alterState(familly, false, null);

            addOrRemoveHidden(enterprise, false);
            addOrRemoveHidden(familly, true);
            break;

        default:
            alterState(all, true, null);
            alterState(enterprise, true, null);
            alterState(familly, true, null);
            break;
    }

    alterState(numberInsuredAbove, true, null);
    alterState(numberInsuredBelow, true, null);
    alterState(prevoiusPlan, true, null);

    addOrRemoveHidden(numberInsuredAbove, false);
    addOrRemoveHidden(numberInsuredBelow, false);
}

// Ocultar ou esconder inputs de acordo com o objetivo
function yourGoal(event){
    const value = event.target.value;
    const retirement = document.querySelectorAll('[data-your-goal="Minha aposentadoria"]');
    const childrenFuture = document.querySelectorAll('[data-your-goal="Futuro dos meus filhos"]');
    const taxIncentive = document.querySelectorAll('[data-your-goal="Incentivo fiscal"]');
    const successionPlanning = document.querySelectorAll('[data-your-goal="Planejamento sucessória"]');

    switch (value) {
        case 'Minha aposentadoria':
            alterState(retirement, false, null);
            alterState(childrenFuture, true, null);
            alterState(taxIncentive, true, null);
            alterState(successionPlanning, true, null);

            addOrRemoveHidden(retirement, true);
            addOrRemoveHidden(childrenFuture, false);
            addOrRemoveHidden(taxIncentive, false);
            addOrRemoveHidden(successionPlanning, false);
            break;

        case 'Futuro dos meus filhos':
            alterState(retirement, true, null);
            alterState(childrenFuture, false, null);
            alterState(taxIncentive, true, null);
            alterState(successionPlanning, true, null);

            addOrRemoveHidden(retirement, false);
            addOrRemoveHidden(childrenFuture, true);
            addOrRemoveHidden(taxIncentive, false);
            addOrRemoveHidden(successionPlanning, false);
            break;

        case 'Incentivo fiscal':
            alterState(retirement, true, null);
            alterState(childrenFuture, true, null);
            alterState(taxIncentive, false, null);
            alterState(successionPlanning, true, null);

            addOrRemoveHidden(retirement, false);
            addOrRemoveHidden(childrenFuture, false);
            addOrRemoveHidden(taxIncentive, true);
            addOrRemoveHidden(successionPlanning, false);
            break;

        case 'Planejamento sucessória':
            alterState(retirement, true, null);
            alterState(childrenFuture, true, null);
            alterState(taxIncentive, true, null);
            alterState(successionPlanning, false, null);

            addOrRemoveHidden(retirement, false);
            addOrRemoveHidden(childrenFuture, false);
            addOrRemoveHidden(taxIncentive, false);
            addOrRemoveHidden(successionPlanning, true);
            break;
    
        default:
            alterState(retirement, true, null);
            alterState(childrenFuture, true, null);
            alterState(taxIncentive, true, null);
            alterState(successionPlanning, true, null);
            break;
    }

    addOrRemoveHidden(document.querySelectorAll('[data-year="hidden"]'), false);
}

// Alterar o tipo de plano da previdencia privada
function alterPlanPrevidence(event){
    const value = event.target.value;
    const life = document.querySelectorAll('[data-type-plan="Vida"]');
    const products = document.querySelectorAll('[data-type-plan="Planos"]');

    switch (value) {
        case 'Planos':
            alterState(life, true, null);
            alterState(products, false, null);

            addOrRemoveHidden(life, false);
            addOrRemoveHidden(products, true);
            break;

        case 'Vida':
            alterState(life, false, null);
            alterState(products, true, null);

            addOrRemoveHidden(life, true);
            addOrRemoveHidden(products, false);
            break;
    
        default:
            alterState(life, true, null);
            alterState(products, true, null);
            break;
    }
}

// Alterar estados de block para none
function alterState(elements, state, exept){
    elements.forEach((element) => {
        if(exept){
            exept.forEach((exept) => {
                const exeptArray = exept.split('=');
                const attr = $(element).attr(exeptArray[0]);
    
                if(!attr|| attr !== exeptArray[1]){
                    $(element).attr('hidden', state);
                }
            });
        }else{
            $(element).attr('hidden', state);
        }
    });
}

// Esconder os inputs caso o pagamento não seja Débito em Conta
function hiddenOrShowInputsAccount(){
    const inputs = document.querySelectorAll('[data-input-radio="form_payment"]');
    const accountHidden = document.querySelectorAll('[data-account="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Débito em conta - 12 dias úteis para o primeiro débito'){

                alterState(accountHidden, false, null);
                addOrRemoveHidden(accountHidden, true);
            }else{

                alterState(accountHidden, true, null);
                addOrRemoveHidden(accountHidden, false);
            }
        });
    });
}

// Ocultar ou exibir o input de anos customoizado
function hiddenOrShowInputYear(){
    const inputs = document.querySelectorAll('[data-input-radio="years_receive"]');
    const yearHidden = document.querySelectorAll('[data-year="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Outro'){

                alterState(yearHidden, false, null);
                addOrRemoveHidden(yearHidden, true);
            }else{

                alterState(yearHidden, true, null);
                addOrRemoveHidden(yearHidden, false);
            }
        });
    });
}

// Esconder ou exibir textarea para descricao
function hiddenOrShowTextArea(){
    const inputs = document.querySelectorAll('[data-input-radio="has_risk_control"]');
    const descriptionHidden = document.querySelectorAll('[data-risk-control="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(descriptionHidden, false, null);
                addOrRemoveHidden(descriptionHidden, true);
            }else{

                alterState(descriptionHidden, true, null);
                addOrRemoveHidden(descriptionHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para data inicial e final
function hiddenOrShowDates(){
    const inputs = document.querySelectorAll('[data-input-radio="feedback"]');
    const dates = document.querySelectorAll('[data-feedback="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(dates, false, null);
                addOrRemoveHidden(dates, true);
            }else{

                alterState(dates, true, null);
                addOrRemoveHidden(dates, false);
            }
        });
    });
}

// Esconder ou exibir campo para inserção de CNAE
function hiddenOrFielsCnae(){
    const inputs = document.querySelectorAll('[data-input-radio="other_activity"]');
    const dates = document.querySelectorAll('[data-other-activity="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(dates, false, null);
            }else{

                alterState(dates, true, null);
            }
        });
    });
}

function purposeInsurance(event){
    const value = event.target.value;
    const events = document.querySelectorAll('[data-purpose-insurance="Para um evento"]');
    const construction = document.querySelectorAll('[data-purpose-insurance="RC de Obras"]');
    const servicesProvision = document.querySelectorAll('[data-purpose-insurance="Prestação de serviços"]');

    switch (value) {
        case 'Para um evento':
            alterState(events, false, null);
            alterState(construction, true, null);
            alterState(servicesProvision, true, null);

            addOrRemoveHidden(events, true);
            addOrRemoveHidden(construction, false);
            addOrRemoveHidden(servicesProvision, false);
            break;

        case 'RC de Obras':
            alterState(events, true, null);
            alterState(construction, false, null);
            alterState(servicesProvision, true, null);

            addOrRemoveHidden(events, false);
            addOrRemoveHidden(construction, true);
            addOrRemoveHidden(servicesProvision, false);
            break;
    
        case 'Prestação de serviços':
            alterState(events, true, null);
            alterState(construction, true, null);
            alterState(servicesProvision, false, null);

            addOrRemoveHidden(events, false);
            addOrRemoveHidden(construction, false);
            addOrRemoveHidden(servicesProvision, true);
            break
    }
}

// Esconder ou exibir inputs para renocação de seguro
function hiddenOrShowPolicyRequest(){
    const inputs = document.querySelectorAll('[data-input-radio="insurance_request"]');
    const inputsHidden = document.querySelectorAll('[data-insurance-request="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Renovação de seguro'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para carro zero
function hiddenOrShowVehicleZero(){
    const inputs = document.querySelectorAll('[data-input-radio="vehicle_is_zero"]');
    const inputsHidden = document.querySelectorAll('[data-vehicle-zero="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para especificar o kit gas
function hiddenOrShowGaskit(){
    const inputs = document.querySelectorAll('[data-input-radio="has_gas_kit"]');
    const inputsHidden = document.querySelectorAll('[data-gaskit="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para rastreador
function hiddenOrShowTracker(){
    const inputs = document.querySelectorAll('[data-input-radio="has_tracker"]');
    const inputsHidden = document.querySelectorAll('[data-tracker="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Alterar o tipo de veiculo para p seguro auto
function alterTypeVehicle(event){
    const value = event.target.value;
    const autoMoto = document.querySelectorAll('[data-type-vehicle="Auto/Moto"]');
    const autoMotoTruck = document.querySelectorAll('[data-type-vehicle="Auto/Moto/Caminhão"]');
    const autoMotoTruckFleet = document.querySelectorAll('[data-type-vehicle="Auto/Moto/Caminhão - Frota"]');
    const truck = document.querySelectorAll('[data-type-vehicle="Caminhão"]');

    switch (value) {
        case 'Auto/Moto':

            alterState(autoMoto, false, null);
            alterState(truck, true, null);
            alterState(autoMotoTruck, false, null);
            alterState(autoMotoTruckFleet, true, null);
            addOrRemoveHidden(autoMoto, true);
            addOrRemoveHidden(truck, false);
            addOrRemoveHidden(autoMotoTruck, true);
            addOrRemoveHidden(autoMotoTruckFleet, false);
            break;

        case 'Auto/Moto - Frota':

            alterState(autoMoto, false, null);
            alterState(truck, true, null);
            alterState(autoMotoTruck, true, null);
            alterState(autoMotoTruckFleet, false, null);
            addOrRemoveHidden(autoMoto, true);
            addOrRemoveHidden(truck, false);
            addOrRemoveHidden(autoMotoTruck, false);
            addOrRemoveHidden(autoMotoTruckFleet, true);
            break;
    
        case 'Caminhão':

            alterState(autoMoto, true, null);
            alterState(truck, false, null);
            alterState(autoMotoTruck, false, null);
            alterState(autoMotoTruckFleet, true, null);
            addOrRemoveHidden(autoMoto, false);
            addOrRemoveHidden(truck, true);
            addOrRemoveHidden(autoMotoTruck, true);
            addOrRemoveHidden(autoMotoTruckFleet, false);
            break;

        case 'Caminhão - Frota':

            alterState(autoMoto, true, null);
            alterState(truck, false, null);
            alterState(autoMotoTruck, true, null);
            alterState(autoMotoTruckFleet, false, null);
            addOrRemoveHidden(autoMoto, false);
            addOrRemoveHidden(truck, true);
            addOrRemoveHidden(autoMotoTruck, false);
            addOrRemoveHidden(autoMotoTruckFleet, true);
            break;
    }
}

// Esconder ou exibir inputs para dependente
function hiddenOrShowDependent(){
    const inputs = document.querySelectorAll('[data-input-radio="has_dependent"]');
    const inputsHidden = document.querySelectorAll('[data-dependent="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para tipos de carroceria
function hiddenOrShowTipperBody(){
    const inputs = document.querySelectorAll('[data-input-radio="has_tipper_body"]');
    const inputsHidden = document.querySelectorAll('[data-tipper-body="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para semi reboque
function hiddenOrShowSemiTrailer(){
    const inputs = document.querySelectorAll('[data-input-radio="has_semi_trailer"]');
    const inputsHidden = document.querySelectorAll('[data-semi-trailer="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsHidden, false, null);
                addOrRemoveHidden(inputsHidden, true);
            }else{

                alterState(inputsHidden, true, null);
                addOrRemoveHidden(inputsHidden, false);
            }
        });
    });
}

// Esconder ou exibir inputs para renocação de seguro para auto
function hiddenOrShowPolicyRequestAuto(){
    const inputs = document.querySelectorAll('[data-input-radio="insurance_request"]');
    const inputsRenew = document.querySelectorAll('[data-insurance-request="Renovação de seguro"]');
    const inputsNew = document.querySelectorAll('[data-insurance-request="Novo seguro"]');
    const inputsSinistro = document.querySelectorAll('[data-sinistro="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Renovação de seguro'){

                alterState(inputsRenew, false, null);
                alterState(inputsNew, true, null);
                addOrRemoveHidden(inputsRenew, true);
                addOrRemoveHidden(inputsNew, false);
            }else{

                alterState(inputsRenew, true, null);
                alterState(inputsNew, false, null);
                addOrRemoveHidden(inputsRenew, false);
                addOrRemoveHidden(inputsNew, true);
            }

            alterState(inputsSinistro, true, null);
            addOrRemoveHidden(inputsSinistro, false);
        });
    });
}

// Esconder ou exibir inputs para saber se houve sinistro
function hiddenOrShowHasSinistro(){
    const inputs = document.querySelectorAll('[data-input-radio="has_sinistro"]');
    const inputsSinistro = document.querySelectorAll('[data-sinistro="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(inputsSinistro, false, null);
                addOrRemoveHidden(inputsSinistro, true);
            }else{

                alterState(inputsSinistro, true, null);
                addOrRemoveHidden(inputsSinistro, false);
            }
        });
    });
}

// Esconder ou exibir inputs de apólice
function hiddenOrShowPolicy(){
    const inputs = document.querySelectorAll('[data-input-radio="has_current_policy"]');
    const pocies = document.querySelectorAll('[data-policy="hidden"]');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){

                alterState(pocies, false, null);
                addOrRemoveHidden(pocies, true);
            }else{

                alterState(pocies, true, null);
                addOrRemoveHidden(pocies, false);
            }
        });
    });
}

// Esconder ou exibir inputs sobre planos anteriores
function hiddenOrShowInputsPlan(){
    const inputs = document.querySelectorAll('[data-input-radio="previous_plan"]');
    const plansHidden = document.querySelectorAll('[data-previous-plan="hidden"]');
    const planType = $('#purpose_insurance');

    inputs.forEach((input) => {
        $(input).click((event) => {
            if(event.target.value === 'Sim'){
                alterState(plansHidden, false, null);
                addOrRemoveHidden(plansHidden, true);

                const numberInsured = $('#number_insured');
                const type = $('#type_plan');
                const above100 = document.querySelectorAll('[data-number-insured="above-100"]');
                const typePlan = document.querySelectorAll('[data-type-plan="saude"]');
            
                if(numberInsured.val() === 'Apartir de 100 vidas'){
                    alterState(above100, false, null);
                    addOrRemoveHidden(above100, true);

                    if(type.val() === 'Dental'){
                        alterState(typePlan, true, null);
                    }
                }else{
                    alterState(above100, true, null);
                    addOrRemoveHidden(above100, false);
                }
            }else{
                alterState(plansHidden, true, null);
                addOrRemoveHidden(plansHidden, false);
            }

            if(planType.val() == 'Familiar'){
                const enterprise = document.querySelectorAll('[data-safe-type="Empresarial"]');
                const numberInsured = document.querySelectorAll('[data-number-insured="above-100"]');

                alterState(enterprise, true, null);
                alterState(numberInsured, true, null);
                addOrRemoveHidden(enterprise, false);
                addOrRemoveHidden(numberInsured, false);
            }
        });
    });
}

// Adicionar ou remover atrubutos required
function addOrRemoveHidden(elements, value){
    elements.forEach((plan) => {
        if($(plan).attr('data-required') == 'true'){
            const names = [];
            const inputs = $(plan).find('input');
            const selects = $(plan).find('select');
            const textAreas = $(plan).find('textarea');

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

// Identificar se o plano é de saúde ou dental
function typePlan(event){
    // Verificar se o input de plano anterior está ativado
    if($("input:radio[name=previous_plan]:checked")[0]){
        alterState(document.querySelectorAll('[data-previous-plan="hidden"]'), true, null);
        $("input:radio[name=previous_plan]:checked")[0].checked = false;
    }
}

// Alterar o estado os inputs para pessoa fisica ou juridica
function alterType(event){
    const value = event.target.value;
    const allInputs = document.querySelectorAll('[data-type="Todos"]');
    const phisicalPerson = document.querySelectorAll('[data-type="Pessoa Física"]');
    const legalPerson = document.querySelectorAll('[data-type="Pessoa Jurídica"]');
    const accountHidden = document.querySelectorAll('[data-account="hidden"]');

    if($("input:radio[name=form_payment]:checked")[0]){
        alterState(document.querySelectorAll('[data-account="hidden"]'), true, null);
        $("input:radio[name=form_payment]:checked")[0].checked = false;
    }

    switch (value) {
        case 'Pessoa Física':
            alterState(allInputs, false, null);
            alterState(phisicalPerson, false, null);
            alterState(legalPerson, true, null);

            addOrRemoveHidden(phisicalPerson, true);
            addOrRemoveHidden(legalPerson, false);
            break;

        case 'Pessoa Jurídica':
            alterState(allInputs, false, null);
            alterState(phisicalPerson, true, null);
            alterState(legalPerson, false, null);

            addOrRemoveHidden(phisicalPerson, false);
            addOrRemoveHidden(legalPerson, true);
            break;

        default:
            alterState(allInputs, true, null);
            alterState(phisicalPerson, true, null);
            alterState(legalPerson, true, null);
            break;
    }

    alterState(accountHidden, true, null);
    addOrRemoveHidden(accountHidden, false);
}

// Aterar exibição de inputs para planos de cartão ou consorcios
function alterTypeProduct(event){
    const value = event.target.value;
    const inputsCard = document.querySelectorAll('[data-type-product="Cartões"]');
    const inputsConsortium = document.querySelectorAll('[data-type-product="Consorcios"]');
    const allInputs = document.querySelectorAll('[data-type="Todos"]');
    const phisicalPerson = document.querySelectorAll('[data-type="Pessoa Física"]');
    const phisicalLegal = document.querySelectorAll('[data-type="Pessoa Jurídica"]');

    switch (value) {
        case 'Cartões':
            alterState(inputsCard, false, null);
            alterState(inputsConsortium, true, null);

            addOrRemoveHidden(inputsCard, true);
            addOrRemoveHidden(inputsConsortium, false);
            break;

        case 'Consorcios':
            alterState(inputsCard, true, null);
            alterState(inputsConsortium, false, null);
            alterState(phisicalPerson, true, null);
            alterState(phisicalLegal, true, null);
            alterState(allInputs, true, null);

            addOrRemoveHidden(inputsCard, false);
            addOrRemoveHidden(inputsConsortium, true);
            addOrRemoveHidden(phisicalPerson, false);
            addOrRemoveHidden(phisicalLegal, false);
            break;
    
        default:
            alterState(inputsCard, true, null);
            alterState(inputsConsortium, true, null);
            break;
    }
}

// Alterar campos para seguros entre 2 a 199 vidas e acima de 200
function numberInsured(event){
    const value = event.target.value;
    const numberInsured = document.querySelectorAll('[data-number-insured="below-100"]');

    if(value == 'Apartir de 100 vidas'){

        alterState(numberInsured, false, null);
        addOrRemoveHidden(numberInsured, true);
    }else{

        alterState(numberInsured, true, null);
        addOrRemoveHidden(numberInsured, false);
    }

    // Verificar se o input de plano anterior está ativado
    if($("input:radio[name=previous_plan]:checked")[0]){
        alterState(document.querySelectorAll('[data-previous-plan="hidden"]'), true, null);
        $("input:radio[name=previous_plan]:checked")[0].checked = false;
    }

    if($("input:radio[name=form_contracting_plan]:checked")[0]){
        alterState(document.querySelectorAll('[data-previous-plan="hidden"]'), true, null);
        $("input:radio[name=form_contracting_plan]:checked")[0].checked = false;
    }
}

