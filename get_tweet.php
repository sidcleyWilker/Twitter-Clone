<?php

    session_start();

    if(!$_SESSION['usuario']){
		header('Location: index.php?erro=1');
	}

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $sql = "SELECT * FROM tweet WHERE id_usuario = $id_usuario ORDER BY data_inclusao DESC";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

            var_dump($registro);

            echo "<br /><br />";

        }

    }else{
    
        echo 'Erro na consulta de tweets no banco de dados!';

    }

?>