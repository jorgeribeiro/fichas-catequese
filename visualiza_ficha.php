<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: Página inacessível.');

// core.php holds pagination variables
include_once 'config/core.php';
 
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
$page_title = "Visualizar ficha completa";
include_once "layout_header.php";
 
// read products button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='fas fa-list'></span> Visualizar fichas";
    echo "</a>";
echo "</div>";

// HTML table for displaying a product details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>{$ficha->nome}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Comunidade</td>";
        echo "<td>{$ficha->comunidade}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Data de nascimento</td>";
        echo "<td>" . date('d/m/Y', strtotime($ficha->data_nascimento)) . "</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Naturalidade</td>";
        echo "<td>{$ficha->naturalidade}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Endereço</td>";
        echo "<td>{$ficha->endereco}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Bairro</td>";
        echo "<td>{$ficha->bairro}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>CEP</td>";
        echo "<td>{$ficha->cep}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Telefone</td>";
        echo "<td>{$ficha->telefone}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Email</td>";
        echo "<td>{$ficha->email}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Estudante</td>";
        echo "<td>" . ($ficha->estudante ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Colégio/Faculdade/Universidade</td>";
        echo "<td>{$ficha->colegio}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Batismo</td>";
        echo "<td>" . ($ficha->batismo ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Eucaristia</td>";
        echo "<td>" . ($ficha->eucaristia ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Data do batismo</td>";        
        echo "<td>" . date('d/m/Y', strtotime($ficha->data_batismo)) . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Paróquia do batismo</td>";
        echo "<td>{$ficha->paroquia_batismo}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Nome do pai</td>";
        echo "<td>{$ficha->nome_pai}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Nome da mãe</td>";
        echo "<td>{$ficha->nome_mae}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Telefone celular pai</td>";
        echo "<td>{$ficha->telefone_celular_pai}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Telefone celular mãe</td>";
        echo "<td>{$ficha->telefone_celular_mae}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Telefone residencial</td>";
        echo "<td>{$ficha->telefone_residencial}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Pais casados da igreja?</td>";
        echo "<td>" . ($ficha->pais_casados_igreja ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Igreja em que foi realizado o casamento</td>";
        echo "<td>{$ficha->igreja_casamento}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Pais vivem juntos?</td>";
        echo "<td>" . ($ficha->pais_vivem_juntos ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Frequentam a comunidade?</td>";
        echo "<td>" . ($ficha->frequentam_comunidade ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Ativos na paróquia?</td>";
        echo "<td>" . ($ficha->ativos_paroquia ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Tipo de participação na paróquia</td>";
        echo "<td>{$ficha->tipo_participacao}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Se frequentam outra paróquia, qual?</td>";
        echo "<td>{$ficha->outra_paroquia}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Turma atual</td>";
        echo "<td>{$ficha->turma_atual}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Dia dos encontros</td>";
        echo "<td>{$ficha->dia_da_semana}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Turno</td>";
        echo "<td>{$ficha->turno}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Ano de início da turma</td>";
        echo "<td>{$ficha->ano_inicio_turma}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Catequista I</td>";
        echo "<td>{$ficha->catequista_1}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Catequista II</td>";
        echo "<td>{$ficha->catequista_2}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Catequista III</td>";
        echo "<td>{$ficha->catequista_3}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Catequizando frequente</td>";
        echo "<td>" . ($ficha->catequizando_frequente ? 'Sim' : 'Não') . "</td>";
    echo "</tr>";
 
echo "</table>";
 
// set footer
include_once "layout_footer.php";
?>