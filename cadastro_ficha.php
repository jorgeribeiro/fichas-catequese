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
    $ficha->comunidade = $_POST['comunidade'];
    $ficha->data_nascimento = $_POST['data_nascimento'];
    $ficha->naturalidade = $_POST['naturalidade'];
    $ficha->endereco = $_POST['endereco'];
    $ficha->bairro = $_POST['bairro'];
    $ficha->cep = $_POST['cep'];
    $ficha->telefone = $_POST['telefone'];
    $ficha->email = $_POST['email'];
    $ficha->estudante = $_POST['estudante'];
    $ficha->colegio = $_POST['colegio'];
    $ficha->batismo = $_POST['batismo'];
    $ficha->eucaristia = $_POST['eucaristia'];
    $ficha->data_batismo = $_POST['data_batismo'];
    $ficha->paroquia_batismo = $_POST['paroquia_batismo'];
    $ficha->nome_pai = $_POST['nome_pai'];
    $ficha->nome_mae = $_POST['nome_mae'];
    $ficha->telefone_celular_pai = $_POST['telefone_celular_pai'];
    $ficha->telefone_celular_mae = $_POST['telefone_celular_mae'];
    $ficha->telefone_residencial = $_POST['telefone_residencial'];
    $ficha->pais_casados_igreja = $_POST['pais_casados_igreja'];
    $ficha->igreja_casamento = $_POST['igreja_casamento'];
    $ficha->pais_vivem_juntos = $_POST['pais_vivem_juntos'];
    $ficha->frequentam_comunidade = $_POST['frequentam_comunidade'];
    $ficha->ativos_paroquia = $_POST['ativos_paroquia'];
    $ficha->tipo_participacao = $_POST['tipo_participacao'];
    $ficha->outra_paroquia = $_POST['outra_paroquia'];
    $ficha->turma_atual = $_POST['turma_atual'];
    $ficha->turno = $_POST['turno'];
    $ficha->ano_inicio_turma = $_POST['ano_inicio_turma'];
    $ficha->catequista_1 = $_POST['catequista_1'];
    $ficha->catequista_2 = $_POST['catequista_2'];
    $ficha->catequista_3 = $_POST['catequista_3'];
    $ficha->catequizando_frequente = $_POST['catequizando_frequente'];
    $ficha->preenchimento_ficha =  $_SESSION['usuario_id'];

 
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
 
    <div style='padding-bottom: 5px'>
        <span class='label label-warning'>Campos marcados com * são obrigatórios.</span>
    </div>
    
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nome completo *</td>
            <td><input type='text' name='nome' id='nome' class='form-control' autofocus required /></td>
        </tr>
        <tr>
            <td>Comunidade</td>
            <td><input type='text' name='comunidade' class='form-control' /></td>
        </tr>
        <tr>
            <td>Data de nascimento *</td>
            <td><input type='text' name='data_nascimento' class='data form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números e a formatação será automática' required /></td>
        </tr>
        <tr>
            <td>Naturalidade *</td>
            <td><input type='text' name='naturalidade' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Endereço *</td>
            <td><input type='text' name='endereco' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Bairro *</td>
            <td><input type='text' name='bairro' class='form-control' required /></td>
        </tr>
        <tr>
            <td>CEP *</td>
            <td><input type='text' name='cep' class='cep form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números e a formatação será automática' required /></td>
        </tr>
        <tr>
            <td>Telefone celular *</td>
            <td><input type='tel' name='telefone' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' required /></td>
        </tr>
         <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>Estudante *</td>
            <td><input type='text' name='estudante' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Nome da escola/faculdade/universidade</td>
            <td><input type='text' name='colegio' class='form-control' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Sacramentos *</td>
            <td>
                <label class='checkbox-inline'><input type='checkbox' name='batismo'>Batismo</label>
                <label class='checkbox-inline'><input type='checkbox' name='eucaristia'>Primeira eucaristia</label>
            </td>
        </tr>    
        <tr>
            <td>Data do batismo</td>
            <td><input type='text' name='data_batismo' class='data form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números e a formatação será automática' /></td>
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
            <td><input type='tel' name='telefone_celular_pai' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr>
            <td>Telefone celular mãe</td>
            <td><input type='tel' name='telefone_celular_mae' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr>
            <td>Telefone residencial</td>
            <td><input type='tel' name='telefone_residencial' class='telefone_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Pais casados na Igreja? *</td>
            <td>
                <label class="radio-inline"><input type="radio" name="optradio">Sim</label>
                <label class="radio-inline"><input type="radio" name="optradio">Não</label>
            </td>
        </tr>
        <tr>
            <td>Igreja em que foi realizado o casamento</td>
            <td><input type='text' name='igreja_casamento' class='form-control' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Pais vivem juntos? *</td>
            <td>
                <label class="radio-inline"><input type="radio" name="optradio">Sim</label>
                <label class="radio-inline"><input type="radio" name="optradio">Não</label>
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Frequentam a comunidade? *</td>
            <<td>
                <label class="radio-inline"><input type="radio" name="optradio">Sim</label>
                <label class="radio-inline"><input type="radio" name="optradio">Não</label>
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Ativos na paróquia? *</td>
            <td>
                <label class="radio-inline"><input type="radio" name="optradio">Sim</label>
                <label class="radio-inline"><input type="radio" name="optradio">Não</label>
            </td>
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
            <td>Turma atual *</td>
            <td><input type='text' name='turma_atual' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Turno *</td>
            <td><input type='text' name='turno' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Ano de início da turma *</td>
            <td><input type='text' name='ano_inicio_turma' class='ano form-control' required /></td>
        </tr>
        <tr>
            <td>Catequista I *</td>
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
        <tr style='height: 51px'>
            <td>Catequizando frequente *</td>
            <td>
                <label class="radio-inline"><input type="radio" name="optradio">Sim</label>
                <label class="radio-inline"><input type="radio" name="optradio">Não</label>
            </td>
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