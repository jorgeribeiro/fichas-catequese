<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/ficha.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$ficha = new Ficha($db);
 
// set ID property of product to be read
$ficha->id = $id;
 
// read the details of product to be read
$ficha->readOne();

// set page headers
$page_title = "Visualizar ficha";
include_once "layout_header.php";
 
// read products button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Visualizar fichas";
    echo "</a>";
echo "</div>";

// HTML table for displaying a product details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>{$ficha->nome}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Data de nascimento</td>";
        echo "<td>{$ficha->data_nascimento}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Naturalidade</td>";
        echo "<td>-</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Bairro</td>";
        echo "<td>-</td>";
    echo "</tr>";
 
echo "</table>";
 
// set footer
include_once "layout_footer.php";
?>