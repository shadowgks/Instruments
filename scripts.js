//Get form
const form_instrument = document.forms['form_instrument'];


//Btns model
var btn_save = document.getElementById("save");
var btn_update = document.getElementById("update");
var btn_delete = document.getElementById("delete");

//Btn edite cart
function btn_edit(id){
    btn_save.style.display = "none";
    btn_update.style.display = "block";
    btn_delete.style.display = "block";

    form_instrument.id_instrument.value = id;
    form_instrument.title.value         = document.getElementById(id).getAttribute('title');
    // form_instrument.picture.value       = document.getElementById(id).getAttribute('picture');
    form_instrument.fammllies.value     = document.getElementById(id).getAttribute('fammiles-id');
    form_instrument.date.value          = document.getElementById(id).getAttribute('date');
    form_instrument.price.value         = document.getElementById(id).getAttribute('price');
    form_instrument.quantities.value    = document.getElementById(id).getAttribute('qnt');
    form_instrument.description.value   = document.getElementById(id).getAttribute('description');
    form_instrument.id_user.value       = document.getElementById(id).getAttribute('id_user');


};

//Btn add cart
function btn_add(){
    btn_save.style.display = "block";
    btn_update.style.display = "none";
    btn_delete.style.display = "none";

    form_instrument.reset();
};
