<?php
// include login checker
$require_login=true;
include_once "login_checker.php";

// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em left-margin'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Pesquisa por nome' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='fas fa-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default'>Limpar pesquisa</a>";
echo "</div>";
 
// create product button
echo "<div class='right-button-margin'>";
    echo "<a href='cadastro_ficha.php' class='btn btn-primary pull-right'>";
        echo "<span class='fas fa-plus'></span> Cadastrar ficha";
    echo "</a>";
echo "</div>";
 
// display the products if there are any
if ($total_rows>0) {
 
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
                    echo "<span class='fas fa-list-ul'></span> Visualizar";
                echo "</a>";
                 
                // edit product button
                echo "<a href='atualiza_ficha.php?id={$id}' class='btn btn-info left-margin'>";
                    echo "<span class='fas fa-edit'></span> Editar";
                echo "</a>";
                 
                // delete product button
                echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                    echo "<span class='fas fa-times'></span> Apagar";
                echo "</a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons
    include_once 'paging.php';
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>Sem fichas encontradas.</div>";
}
?>