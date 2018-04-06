<?php
// core.php holds pagination variables
include_once 'config/core.php';

// include login checker
$require_login=true;
include_once "login_checker.php";

// check if value was posted
if ($_POST) {
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/ficha.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $ficha = new Ficha($db);
     
    // set product id to be deleted
    $ficha->id = $_POST['object_id'];
     
    // delete the product
    if($ficha->delete()){
        echo "Ficha apagada.";
    }
     
    // if unable to delete the product
    else{
        echo "Erro ao apagar ficha.";
    }
}
?>