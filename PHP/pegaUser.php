<?php

	ini_set('default_charset','UTF-8');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
	
    include('conexaoLogin.php'); 

    try { 
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$conecta->exec("SET CHARACTER SET utf8");
		$consulta = $conecta->prepare("SELECT * FROM tb01_nome where tb01_id = 1");
		$consulta->execute(array()); 
		$resultadoDaConsulta = $consulta->fetchAll();
 
		$StringJson = "["; 
		
		if (!count($resultadoDaConsulta) ) {
			$StringJson .= '{"tb01_nome":"vazio"}]';
			echo($StringJson);
		}
						
	    if ( count($resultadoDaConsulta) ) {
		  foreach($resultadoDaConsulta as $registro) 
		  { 
			if ($StringJson != "[") 
				{$StringJson .= ",";}
			
			$StringJson .= '{"tb01_nome":"' . $registro['tb01_nome']  . '",';
			$StringJson .= '"tb01_senha":"' . $registro['tb01_senha'] . '"}';
			
		    }  
		echo $StringJson . "]"; 
        } 
 
	} catch(PDOException $e) { // caso retorne erro

		echo('Deu erro: ' . $e->getMessage()); 
	}
?>
