//Btns model
var btn_save = document.getElementById("save");
var btn_update = document.getElementById("update");
var btn_delete = document.getElementById("delete");

//Btn edite cart
function btn_edit(){
    btn_save.style.display = "none";
    btn_update.style.display = "block";
    btn_delete.style.display = "block";
};

//Btn add cart
function btn_add(){
    btn_save.style.display = "block";
    btn_update.style.display = "none";
    btn_delete.style.display = "none";
};
