<?php
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 8;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php';
include_once 'objects/ficha.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$ficha = new Ficha($db);
 
// query products
$stmt = $ficha->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// set page header
$page_title = "Visualizar fichas";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='cadastro_ficha.php' class='btn btn-default pull-right'>Cadastrar ficha</a>";
echo "</div>";

// display the products if there are any
if ($num > 0) {
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Data de nascimento</th>";
            echo "<th>Naturalidade</th>";
            echo "<th>Bairro</th>";
            echo "<th>Ações</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$nome}</td>";
                echo "<td>{$data_nascimento}</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>";
                    // read one, edit and delete button will be here
                // read product button
				echo "<a href='visualiza_ficha.php?id={$id}' class='btn btn-primary left-margin'>";
				    echo "<span class='glyphicon glyphicon-list'></span> Visualizar";
				echo "</a>";
				 
				// edit product button
				echo "<a href='atualiza_ficha.php?id={$id}' class='btn btn-info left-margin'>";
				    echo "<span class='glyphicon glyphicon-edit'></span> Editar";
				echo "</a>";
				 
				// delete product button
				echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
				    echo "<span class='glyphicon glyphicon-remove'></span> Apagar";
				echo "</a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // the page where this paging is used
	$page_url = "index.php?";
	 
	// count all products in the database to calculate total pages
	$total_rows = $ficha->countAll();
	 
	// paging buttons here
	include_once 'paging.php';
}
 
// tell the user there are no products
else {
    echo "<div class='alert alert-info'>Sem fichas encontradas.</div>";
}
 
// set page footer
include_once "layout_footer.php";
?>