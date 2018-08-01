<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Registro";
 
// include login checker
include_once "login_checker.php";

// include page header HTML
include_once "layout_header.php";

// if form was posted
if ($_POST) {
	// include classes
	include_once 'config/database.php';
	include_once 'objects/usuario.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $usuario = new Usuario($db);
 
    // set user email to detect if it already exists
    $usuario->email = $_POST['email'];
 
    // check if email already exists
    if ($usuario->emailExists()) {
        echo "<div class='alert alert-danger'>";
            echo "O email inserido já está cadastrado. Tente novamente ou realize <a href='{$home_url}login'>login.</a>";
        echo "</div>";
    }
 
    else {
        // set values to object properties
		$usuario->nome = $_POST['nome'];
		$usuario->sobrenome = $_POST['sobrenome'];
		$usuario->telefone_fixo = $_POST['telefone_fixo'];
		$usuario->telefone_celular = $_POST['telefone_celular'];
		$usuario->endereco = $_POST['endereco'];
		$usuario->senha = $_POST['senha'];
		$usuario->status = 0;
		 
		// create the user
		if ($usuario->create()) {
		 
		    echo "<div class='alert alert-info'>";
		        echo "Registro realizado com sucesso. Solicite a liberação do seu acesso ao administrador do sistema.";
		    echo "</div>";
		 
		    // empty posted values
		    $_POST = array();
		 
		} else {
		    echo "<div class='alert alert-danger' role='alert'>Erro ao registrar. Tente novamente.</div>";
		}
    }
}
 
echo "<div class='col-md-12'>";
?>
	<form action='registro.php' method='post' id='register'>
	 
	    <table class='table table-responsive'>
	 
	        <tr>
	            <td class='width-30-percent'>Nome</td>
	            <td><input type='text' name='nome' class='form-control' autofocus required value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Sobrenome</td>
	            <td><input type='text' name='sobrenome' class='form-control' required value="<?php echo isset($_POST['sobrenome']) ? htmlspecialchars($_POST['sobrenome'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>

	        <tr>
	            <td>Telefone fixo</td>
	            <td><input type='text' name='telefone_fixo' class='telefone_com_ddd form-control' value="<?php echo isset($_POST['telefone_fixo']) ? htmlspecialchars($_POST['telefone_fixo'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Telefone celular</td>
	            <td><input type='text' name='telefone_celular' class='celular_com_ddd form-control' required value="<?php echo isset($_POST['telefone_celular']) ? htmlspecialchars($_POST['telefone_celular'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Endereço</td>
	            <td><textarea name='endereco' class='form-control' required><?php echo isset($_POST['endereco']) ? htmlspecialchars($_POST['endereco'], ENT_QUOTES) : "";  ?></textarea></td>
	        </tr>
	 
	        <tr>
	            <td>Email</td>
	            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Senha</td>
	            <td><input type='password' name='senha' class='form-control' required id='passwordInput'></td>
	        </tr>
	 
	        <tr>
	            <td></td>
	            <td>
	                <button type="submit" class="btn btn-success">
	                    <span class="fas fa-user-plus"></span> Registrar-se
	                </button>
	            </td>
	        </tr>
	 
	    </table>
	</form>
	<?php
 
echo "</div>";
 
// include page footer HTML
include_once "layout_footer.php";
?>