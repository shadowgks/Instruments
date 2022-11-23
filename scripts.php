<?php
//INCLUDE DATABASE FILE
include("db/connexionDB.php");
include("cruds/add.php");
include("cruds/delete.php");
include("cruds/edit.php");
include("cruds/read.php");
include("cruds/search.php");

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//Login
if(isset($_POST['register'])){
    regestreUser();
}
if(isset($_POST['sign_in'])){
    signinUser();
}

//============================
//CRUD
if(isset($_POST['save'])){
    saveInstrument();
}
if(isset($_POST['update'])){
    updateInstrument();
}
if(isset($_POST['delete'])){
    deleteInstrument();
}

//============================
//Edit Profile
if(isset($_POST['update_profile'])){
    updateProfile();
}



