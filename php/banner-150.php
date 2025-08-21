<div class="banner-150">
	<ul>
	
	<?
		if ($_REQUEST["bannerLateralCompleto"] == "S") {	
			$sql = " SELECT * FROM bannerlateral " 
				 . " ORDER BY rand(); ";
		} else {
			$sql = " SELECT * FROM bannerlateral " 
				 . " ORDER BY rand() LIMIT 36; ";
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
				
			?>
				<li><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" width="150" height="200" border="0" alt=""></a></li>				
		<? 
			}
		}
		
		if ($_REQUEST["bannerLateralCompleto"] != "S") {	
			echo "<div align='center' class='photo thumb'><a href='#' onclick='mostraBannerLateral()'><em><< Ver + Banners >></em></a></div>";
		}		
		?>	 	
	</ul>
</div>