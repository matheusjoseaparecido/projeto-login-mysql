function pegaUser()
	{

		let user = document.querySelector('#user');
		let senha = document.querySelector('#senha');

	    var xmlhttp = new XMLHttpRequest();

		//Prepara link para acionar PHP
		
		var url = "http://localhost:8080/PHP/pegaUser.php?user="+user+"&senha="+senha;
		
		xmlhttp.onreadystatechange = function () 
		{
			
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				ConectaServidor(xmlhttp.responseText);
			}
		}
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
			
		function ConectaServidor(response) {
			 
			var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
			var i=0;
			var conteudo = "";
			var linhas;
			
			// O for() vai montar a linha (<TR>) da tabela
			for (i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
			{
				if (dados[i].tb01_nome == "vazio")
				{					
					alert ("Falta registro de login")

				}
				else
				{
					usuario = dados[i].tb01_nome; 
					usuario++;
					window.alert("Bem vindo " + dados[i].tb01_nome);
				}
			}				
		}
	}