<?php
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
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
    echo "<a href='index.php' class='btn btn-default pull-right'>Visualizar fichas</a>";
echo "</div>";
 
?>

<?php 
// if the form was submitted
if ($_POST) {
 
    // set product property values
    $ficha->nome = $_POST['nome'];
    $ficha->data_nascimento = $_POST['data_nascimento'];
 
    // update the product
    if ($ficha->update()) {
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Ficha atualizada.";
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
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $ficha->nome; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Data de nascimento</td>
            <td><input type='text' name='data_nascimento' value='<?php echo $ficha->data_nascimento; ?>' class='form-control' /></td>
        </tr>       
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Atualizar ficha</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
 
// set page footer
include_once "layout_footer.php";
?>