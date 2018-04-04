<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Login";
 
// include login checker
$require_login=false;
include_once "login_checker.php";
 
// default to false
$invalid_login=false;
$access_denied=false;
 
// if the login form was submitted
if ($_POST) {
    // include classes
	include_once "config/database.php";
	include_once "objects/usuario.php";
	 
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
	 
	// initialize objects
	$usuario = new Usuario($db);
	 
	// check if email and password are in the database
	$usuario->email=$_POST['email'];
	 
	// check if email exists, also get user details using this emailExists() method
	$email_exists = $usuario->emailExists();
	 
	// validate login
	if ($email_exists && password_verify($_POST['senha'], $usuario->senha)) {
		// if account is confirmed
		if ($usuario->status==1) {
			// if it is, set the session value to true
		    $_SESSION['logged_in'] = true;
		    $_SESSION['usuario_id'] = $usuario->id;
		    $_SESSION['access_level'] = $usuario->access_level;
		    $_SESSION['nome'] = htmlspecialchars($usuario->nome, ENT_QUOTES, 'UTF-8') ;
		    $_SESSION['sobrenome'] = $usuario->sobrenome;
		 
		    // if access level is 'Admin', redirect to admin section
		    if ($usuario->access_level=='Admin') {
		        header("Location: {$home_url}admin/index.php?action=login_success");
		    }
		 
		    // else, redirect only to 'Customer' section
		    else {
		        header("Location: {$home_url}");
		    }
		} 

		// if account is not confirmed
		else {
			$access_denied=true;
		}
		    
	}
	 
	// if username does not exist or password is wrong
	else {
	    $invalid_login=true;
	}
}
 
// include page header HTML
include_once "layout_header.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // get 'action' value in url parameter to display corresponding prompt messages
	$action=isset($_GET['action']) ? $_GET['action'] : "";
	 
	// tell the user he is not yet logged in
	if ($action =='not_yet_logged_in') {
	    echo "<div class='alert alert-danger margin-top-40' role='alert'>Entre no sistema com seu email e senha.</div>";
	}
	 
	// tell the user to login
	else if ($action=='please_login') {
	    echo "<div class='alert alert-info'>
	        <strong>Por favor, entre no sistema.</strong>
	    </div>";
	}
	 
	// tell the user if access denied
	if ($access_denied) {
	    echo "<div class='alert alert-danger margin-top-40' role='alert'>
	        Acesso não permitido.<br/>
	        Aguarde a liberação do mesmo.
	    </div>";
	}

	if ($invalid_login) {
		echo "<div class='alert alert-danger margin-top-40' role='alert'>
	        Seu email e senha podem estar incorretos.
	    </div>";	
	}
 
    // actual HTML login form
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";                
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='senha' class='form-control' placeholder='Senha' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Entrar' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include_once "layout_footer.php";
?>