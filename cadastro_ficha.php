<?php
// core.php holds pagination variables
include_once 'config/core.php';

// include database and object files
include_once 'config/database.php';
include_once 'objects/ficha.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$ficha = new Ficha($db);

// set page headers
$page_title = "Cadastrar ficha";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='fas fa-list'></span> Visualizar fichas";
    echo "</a>";
echo "</div>";
?>

<?php
// if the form was submitted
if ($_POST) {
 
    // set product property values
    $ficha->nome = $_POST['nome'];
    $ficha->data_nascimento = $_POST['data_nascimento'];
 
    // create the product
    if ($ficha->create()) {
        echo "<div class='alert alert-success'>Ficha cadastrada.</div>";
    }
 
    // if unable to create the product, tell the user
    else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar ficha.</div>";
    }
}
?>
 
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Nome completo</td>
            <td><input type='text' name='nome' class='form-control' autofocus required /></td>
        </tr>
        <tr>
            <td>Comunidade</td>
            <td><input type='text' name='comunidade' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Data de nascimento</td>
            <td><input type='date' name='data_nascimento' class='data form-control' required /></td>
        </tr>
        <tr>
            <td>Naturalidade</td>
            <td><input type='text' name='naturalidade' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><input type='text' name='endereco' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Bairro</td>
            <td><input type='text' name='bairro' class='form-control' required /></td>
        </tr>
        <tr>
            <td>CEP</td>
            <td><input type='text' name='cep' class='cep form-control' required /></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><input type='tel' name='telefone' class='celular_com_ddd form-control' required /></td>
        </tr>
         <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>Estudante</td>
            <td><input type='text' name='estudante' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Nome da escola/faculdade/universidade</td>
            <td><input type='text' name='colegio' class='form-control' /></td>
        </tr>
        <tr>
            <td>Batismo</td>
            <td><input type='text' name='batismo' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Primeira eucaristia</td>
            <td><input type='text' name='eucaristia' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Data do batismo</td>
            <td><input type='date' name='data_batismo' class='data form-control' /></td>
        </tr>
        <tr>
            <td>Paróquia do batismo</td>
            <td><input type='text' name='paroquia_batismo' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome do pai</td>
            <td><input type='text' name='nome_pai' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome da mãe</td>
            <td><input type='text' name='nome_mae' class='form-control' /></td>
        </tr>
        <tr>
            <td>Telefone celular pai</td>
            <td><input type='tel' name='telefone_celular_pai' class='celular_com_ddd form-control' required /></td>
        </tr>
        <tr>
            <td>Telefone celular mãe</td>
            <td><input type='tel' name='telefone_celular_mae' class='celular_com_ddd form-control' required /></td>
        </tr>
        <tr>
            <td>Telefone residencial</td>
            <td><input type='tel' name='telefone_residencial' class='telefone_com_ddd form-control' /></td>
        </tr>
        <tr>
            <td>Pais casados na Igreja?</td>
            <td><input type='text' name='pais_casados_igreja' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Igreja em que foi realizado o casamento</td>
            <td><input type='text' name='igreja_casamento' class='form-control' /></td>
        </tr>
        <tr>
            <td>Pais vivem juntos?</td>
            <td><input type='text' name='pais_vivem_juntos' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Frequentam a comunidade?</td>
            <td><input type='text' name='frequentam_comunidade' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Ativos na paróquia?</td>
            <td><input type='text' name='ativos_paroquia' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Tipo de participação na paróquia</td>
            <td><input type='text' name='tipo_participacao' class='form-control' /></td>
        </tr>
        <tr>
            <td>Se frequentam outra paróquia, qual?</td>
            <td><input type='text' name='outra_paroquia' class='form-control' /></td>
        </tr>
        <tr>
            <td>Turma atual</td>
            <td><input type='text' name='turma_atual' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Turno</td>
            <td><input type='text' name='turno' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Ano de início da turma</td>
            <td><input type='text' name='ano_inicio_turma' class='ano form-control' required /></td>
        </tr>
        <tr>
            <td>Catequista I</td>
            <td><input type='text' name='catequista_1' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Catequista II</td>
            <td><input type='text' name='catequista_2' class='form-control' /></td>
        </tr>
        <tr>
            <td>Catequista III</td>
            <td><input type='text' name='catequista_3' class='form-control' /></td>
        </tr>
        <tr>
            <td>Catequizando frequente</td>
            <td><input type='text' name='catequizando_frequent' class='form-control' required /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">
                    <span class="fas fa-save"></span> Cadastrar ficha
                </button>            
            </td>
        </tr>
 
    </table>
</form>
<?php
 
// footer
include_once "layout_footer.php";
?>