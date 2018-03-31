<?php
// include login checker
$require_login=true;
include_once "login_checker.php";

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
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' focus='true' required /></td>
        </tr>
 
        <tr>
            <td>Data de nascimento</td>
            <td><input type='text' name='data_nascimento' class='form-control' required /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Cadastrar ficha</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
// footer
include_once "layout_footer.php";
?>