//Get form
var form_instrument = document.forms['form_instrument'];

//Btns model
var btn_save   = document.getElementById("save");
var btn_update = document.getElementById("update");
var btn_delete = document.getElementById("delete");

//Btn edite cart
function btn_edit(id){
    btn_save.style.display   = "none";
    btn_update.style.display = "block";
    btn_delete.style.display = "block";

    //Remplier les values
    form_instrument.id_instrument.value = id;
    form_instrument.title.value         = document.getElementById(id).getAttribute('title');
    form_instrument.fammllies.value     = document.getElementById(id).getAttribute('fammiles-id');
    form_instrument.date.value          = document.getElementById(id).getAttribute('date');
    form_instrument.price.value         = document.getElementById(id).getAttribute('price');
    form_instrument.quantities.value    = document.getElementById(id).getAttribute('qnt');
    form_instrument.description.value   = document.getElementById(id).getAttribute('description');
};

//Btn add cart
function btn_add(){
    btn_save.style.display   = "block";
    btn_update.style.display = "none";
    btn_delete.style.display = "none";

    //Reset form
    form_instrument.reset();
};

//Modal 2 Confirmer if user need update or delete
document.getElementById("delete").addEventListener("click",()=>{
    document.getElementById("save_confirme_m2").setAttribute("name","delete");
})
document.getElementById("update").addEventListener("click",()=>{
    document.getElementById("save_confirme_m2").setAttribute("name","update");
})
