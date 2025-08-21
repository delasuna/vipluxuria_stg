<div id="destaques-2020">

	<div id="slider-content-destaques">
		<script type="text/javascript">
		        $(document).ready(function(){
		          $('.bxslider-destaques').bxSlider({
		              auto: 'true',
					  slideWidth: 150,	
					  minSlides: 2,
					  maxSlides: 6,
					  slideMargin: 10
		          });
		        });
		</script>
	    <div class="bxslider-destaques">
			<?
			  $sql = " SELECT * FROM bannerlateral " 
				   . " ORDER BY rand(); ";
			  
											   
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
					<div style="width: 150px;"><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" width="150" height="200"></a></div>							  
			  <? 
				  }
			  }
			?>
		</div>	    
	</div>
</div><!--DESTAQUES 2020-->