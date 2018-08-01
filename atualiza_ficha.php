<?php
// get ID of the product to be edited
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
 
// set ID property of product to be edited
$ficha->id = $id;
 
// read the details of product to be edited
$ficha->readOne();

// set page header
$page_title = "Atualizar ficha";
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
    $ficha->nome = $_POST['nome'];
    $ficha->comunidade = $_POST['comunidade'];
    $ficha->data_nascimento = $_POST['data_nascimento'];
    $ficha->naturalidade = $_POST['naturalidade'];
    $ficha->endereco = $_POST['endereco'];
    $ficha->bairro = $_POST['bairro'];
    $ficha->cep = $_POST['cep'];
    $ficha->telefone = $_POST['telefone'];
    $ficha->email = $_POST['email'];
    if (isset($_POST['estudante'])) {
        $ficha->estudante = $_POST['estudante'];
    }
    $ficha->colegio = $_POST['colegio'];
    if (isset($_POST['batismo'])) {
        $ficha->batismo = $_POST['batismo'];
    } else {
        $ficha->batismo = false;
    }
    if (isset($_POST['eucaristia'])) {
        $ficha->eucaristia = $_POST['eucaristia'];
    } else {
        $ficha->eucaristia = false;
    }
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
    $ficha->dia_da_semana = $_POST['dia_da_semana']; 
    $ficha->turno = $_POST['turno'];
    $ficha->ano_inicio_turma = $_POST['ano_inicio_turma'];
    $ficha->catequista_1 = $_POST['catequista_1'];
    $ficha->catequista_2 = $_POST['catequista_2'];
    $ficha->catequista_3 = $_POST['catequista_3'];
    $ficha->catequizando_frequente = $_POST['catequizando_frequente'];
    $ficha->preenchimento_ficha = $_SESSION['usuario_id'];
 
    // update the product
    if ($ficha->update()) {
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Ficha atualizada com sucesso.";
        echo "</div>";
    }
 
    // if unable to update the product, tell the user
    else {
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Erro ao atualizar ficha.";
        echo "</div>";
    }
}
?>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Nome completo *</td>
            <td><input type='text' name='nome' value='<?php echo $ficha->nome ?>' class='form-control' autofocus required /></td>
        </tr>
        <tr>
            <td>Comunidade</td>
            <td><input type='text' name='comunidade' value='<?php echo $ficha->comunidade ?>' class='form-control' data-toggle='tooltip' data-placement='right' title='Nome do bairro em que está situada a Paróquia' /></td>
        </tr>
        <tr>
            <td>Data de nascimento *</td>
            <td><input type='text' name='data_nascimento' value='<?php echo date('d/m/Y', strtotime($ficha->data_nascimento)) ?>' class='data form-control' required /></td>
        </tr>
        <tr>
            <td>Naturalidade *</td>
            <td><input type='text' name='naturalidade' value='<?php echo $ficha->naturalidade ?>' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Endereço *</td>
            <td><input type='text' name='endereco' value='<?php echo $ficha->endereco ?>' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Bairro *</td>
            <td><input type='text' name='bairro' value='<?php echo $ficha->bairro ?>' class='form-control' required /></td>
        </tr>
        <tr>
            <td>CEP *</td>
            <td><input type='text' name='cep' value='<?php echo $ficha->cep ?>' class='cep form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números e a formatação será automática' required /></td>
        </tr>
        <tr>
            <td>Telefone celular *</td>
            <td><input type='tel' name='telefone' value='<?php echo $ficha->telefone ?>' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' required /></td>
        </tr>
         <tr>
            <td>Email</td>
            <td><input type='email' name='email' value='<?php echo $ficha->email ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Estudante</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->estudante ? 'checked' : '' ?> name='estudante'>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->estudante ? '' : 'checked' ?> name='estudante'>Não</label>
            </td>
        </tr>
        <tr>
            <td>Nome da escola/faculdade/universidade</td>
            <td><input type='text' name='colegio' value='<?php echo $ficha->colegio ?>' class='form-control' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Sacramentos</td>
            <td>
                <label class='checkbox-inline'><input type='checkbox' name='batismo' value='1' <?php echo $ficha->batismo ? 'checked' : '' ?>>Batismo</label>
                <label class='checkbox-inline'><input type='checkbox' name='eucaristia' value='1' <?php echo $ficha->eucaristia ? 'checked' : '' ?>>Primeira eucaristia</label>
            </td>
        </tr>    
        <tr>
            <td>Data do batismo</td>
            <td><input type='text' name='data_batismo' value='<?php echo date('d/m/Y', strtotime($ficha->data_batismo)) ?>' class='data form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números e a formatação será automática' /></td>
        </tr>
        <tr>
            <td>Paróquia do batismo</td>
            <td><input type='text' name='paroquia_batismo' value='<?php echo $ficha->paroquia_batismo ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome do pai</td>
            <td><input type='text' name='nome_pai' value='<?php echo $ficha->nome_pai ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome da mãe</td>
            <td><input type='text' name='nome_mae' value='<?php echo $ficha->nome_mae ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Telefone celular pai</td>
            <td><input type='tel' name='telefone_celular_pai' value='<?php echo $ficha->telefone_celular_pai ?>' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr>
            <td>Telefone celular mãe</td>
            <td><input type='tel' name='telefone_celular_mae' value='<?php echo $ficha->telefone_celular_mae ?>' class='celular_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr>
            <td>Telefone residencial</td>
            <td><input type='tel' name='telefone_residencial' value='<?php echo $ficha->telefone_residencial ?>' class='telefone_com_ddd form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas os números (com DDD) e a formatação será automática' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Pais casados na Igreja? *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->pais_casados_igreja ? 'checked' : '' ?> name='pais_casados_igreja' required>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->pais_casados_igreja ? '' : 'checked' ?> name='pais_casados_igreja'>Não</label>
            </td>
        </tr>
        <tr>
            <td>Igreja em que foi realizado o casamento</td>
            <td><input type='text' name='igreja_casamento' value='<?php echo $ficha->igreja_casamento ?>' class='form-control' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Pais vivem juntos? *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->pais_vivem_juntos ? 'checked' : '' ?> name='pais_vivem_juntos' required>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->pais_vivem_juntos ? '' : 'checked' ?> name='pais_vivem_juntos'>Não</label>
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Frequentam a comunidade? *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->frequentam_comunidade ? 'checked' : '' ?> name='frequentam_comunidade' required>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->frequentam_comunidade ? '' : 'checked' ?> name='frequentam_comunidade'>Não</label>
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Ativos na paróquia? *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->ativos_paroquia ? 'checked' : '' ?> name='ativos_paroquia' required>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->ativos_paroquia ? '' : 'checked' ?> name='ativos_paroquia'>Não</label>
            </td>
        </tr>
        <tr>
            <td>Tipo de participação na paróquia</td>
            <td><input type='text' name='tipo_participacao' value='<?php echo $ficha->tipo_participacao ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Se frequentam outra paróquia, qual?</td>
            <td><input type='text' name='outra_paroquia' value='<?php echo $ficha->outra_paroquia ?>' class='form-control' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Turma atual *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='Pré-iniciação' <?php echo $ficha->turma_atual == 'Pré-iniciação' ? 'checked' : '' ?> name='turma_atual' required>Pré-iniciação</label>
                <label class='radio-inline'><input type='radio' value='Iniciação' <?php echo $ficha->turma_atual == 'Iniciação' ? 'checked' : '' ?> name='turma_atual'>Iniciação</label>
                <label class='radio-inline'><input type='radio' value='Eucaristia' <?php echo $ficha->turma_atual == 'Eucaristia' ? 'checked' : '' ?> name='turma_atual'>Eucaristia</label>
                <label class='radio-inline'><input type='radio' value='Perseverança' <?php echo $ficha->turma_atual == 'Perseverança' ? 'checked' : '' ?> name='turma_atual'>Perseverança</label>
                <label class='radio-inline'><input type='radio' value='Crisma' <?php echo $ficha->turma_atual == 'Crisma' ? 'checked' : '' ?> name='turma_atual'>Crisma</label>
                <label class='radio-inline'><input type='radio' value='Adultos' <?php echo $ficha->turma_atual == 'Adultos' ? 'checked' : '' ?> name='turma_atual'>Adultos</label>
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Dia dos encontros *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='Sábado' <?php echo $ficha->dia_da_semana == 'Sábado' ? 'checked' : '' ?> name='dia_da_semana' required>Sábado</label>
                <label class='radio-inline'><input type='radio' value='Domingo' <?php echo $ficha->dia_da_semana == 'Domingo' ? 'checked' : '' ?> name='dia_da_semana'>Domingo</label>               
            </td>
        </tr>
        <tr style='height: 51px'>
            <td>Turno *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='Manhã' <?php echo $ficha->turno == 'Manhã' ? 'checked' : '' ?> name='turno' required>Manhã</label>
                <label class='radio-inline'><input type='radio' value='Tarde' <?php echo $ficha->turno == 'Tarde' ? 'checked' : '' ?> name='turno'>Tarde</label>
                <label class='radio-inline'><input type='radio' value='Noite' <?php echo $ficha->turno == 'Noite' ? 'checked' : '' ?> name='turno'>Noite</label>
            </td>
        </tr>    
        <tr>
            <td>Ano de início da turma *</td>
            <td><input type='text' name='ano_inicio_turma' value='<?php echo $ficha->ano_inicio_turma ?>' class='ano form-control' required /></td>
        </tr>
        <tr>
            <td>Catequista I *</td>
            <td><input type='text' name='catequista_1' value='<?php echo $ficha->catequista_1 ?>' class='form-control' data-toggle='tooltip' data-placement='right' title='Insira apenas nome e sobrenome do(a) catequista' required /></td>
        </tr>
        <tr>
            <td>Catequista II</td>
            <td><input type='text' name='catequista_2' value='<?php echo $ficha->catequista_2 ?>' class='form-control' data-toggle='tooltip' data-placement='right' title='Preencha apenas nome e sobrenome do(a) catequista' /></td>
        </tr>
        <tr>
            <td>Catequista III</td>
            <td><input type='text' name='catequista_3' value='<?php echo $ficha->catequista_3 ?>' class='form-control' data-toggle='tooltip' data-placement='right' title='Preencha apenas nome e sobrenome do(a) catequista' /></td>
        </tr>
        <tr style='height: 51px'>
            <td>Catequizando frequente *</td>
            <td>
                <label class='radio-inline'><input type='radio' value='1' <?php echo $ficha->catequizando_frequente ? 'checked' : '' ?> name='catequizando_frequente' required>Sim</label>
                <label class='radio-inline'><input type='radio' value='0' <?php echo $ficha->catequizando_frequente ? '' : 'checked' ?> name='catequizando_frequente'>Não</label>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type='submit' class='btn btn-success'>
                    <span class='fas fa-edit'></span> Atualizar ficha
                </button>  
            </td>
        </tr>
 
    </table>
</form>

<?php
 
// set page footer
include_once "layout_footer.php";
?>