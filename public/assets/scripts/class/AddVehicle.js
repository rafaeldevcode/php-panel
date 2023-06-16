class AddVehicle{
    constructor(formSelector){
        this.formSelector = formSelector;
    }

    init(){
        document.querySelector(this.formSelector).addEventListener('submit', (event) => {
            event.preventDefault();
            alert()
        });
    }
}

const vehicle = new AddVehicle('[data-submit="save"]');
vehicle.init();
