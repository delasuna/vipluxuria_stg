<div id="destaques">
	<div class="titulo-destaques">Destaques</div>
	<ul>
	<?
		if ($_REQUEST["bannerLateralCompleto"] == "S") {	
			$sql = " SELECT * FROM bannerlateral " 
				 . " ORDER BY rand(); ";
		} else {
			$sql = " SELECT * FROM bannerlateral " 
				 . " ORDER BY rand() LIMIT 25; ";
		}	
										 
		$resultado = mysql_query($sql, $conexao);
		if(!$resultado){
			die("Impossível visualizar os banners: " . mysql_error() . '<br>');
		}
		$contador = 0;
		
		$sts = mysql_query($sql);
		$registros = mysql_num_rows($sts);

		if ($registros>0) {
			while($row = mysql_fetch_array($resultado)) {
				$idBannerLateral = $row['idBannerLateral'];
				$descricao = $row['descricao'];	
				$imagem = $row['imagem'];
				$site = $row['site'];
				$nome = $row['nome'];
				$sobrenome = $row['sobrenome'];				
				
			?>
				<li><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" width="150" height="200"><p class="nome-destaque"><?=$nome?> <?=$sobrenome?></p></a></li>
				
		<? 
			}
		}
		
		?>	 	
	
    </ul>
    <div id="mais">
    	
		<? 
		if ($_REQUEST["bannerLateralCompleto"] != "S") {	
			echo "<img src='/imagens/estrutura/bt-destaques.png' onclick='mostraBannerLateral()'/>";
		}		
		?>	 	
	</div>
</div><!--DESTAQUES-->