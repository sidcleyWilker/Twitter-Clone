<?php
	
	session_start();

	 require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objDb = new Db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

    	$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){

            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');

        }else{
            header('Location: index.php?erro=1');
        }
    }else{
    	echo "Erro na consulta, por favor entre em contato com o adm do site";
    }
    

?>