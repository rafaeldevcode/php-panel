'use strict';

class Location{
    static citys(selector){
        selector = Array.isArray(selector) ? selector : [selector];
    
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/distritos?view=nivelado', (response) => {
            const citys = [];
    
            response.forEach((res) => {
                !citys.includes(res['municipio-nome']) ? citys.push(res['municipio-nome']) : null;
            });
    
            selector.forEach((item) => {
                citys.forEach((city) => {
                    const option = $('<option />');
                    option.text(city);
    
                    $(item).append(option);
                });
            });
        });
    }
    
    static states(){
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?view=nivelado', (response) => {
            response.forEach((state) => {
                const option = $('<option />');
                option.text(`${state['UF-nome']} - ${state['UF-sigla']}`);

                $('#uf').append(option);
            });
        });
    }
}
