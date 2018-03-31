<?php
// core.php holds pagination variables
include_once 'config/core.php';

// include login checker
$require_login=true;
include_once "login_checker.php";
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/ficha.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
$ficha = new Ficha($db);
 
$page_title = "Visualizar fichas";
include_once "layout_header.php";
 
// query products
$stmt = $ficha->readAll($from_record_num, $records_per_page);
 
// specify the page where paging is used
$page_url = "index.php?";
 
// count total rows - used for pagination
$total_rows=$ficha->countAll();
 
// read_template.php controls how the product list will be rendered
include_once "visualiza_template.php";
 
// layout_footer.php holds our javascript and closing html tags
include_once "layout_footer.php";
?>