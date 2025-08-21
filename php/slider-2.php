<div id="slider-content-2">
<script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider-2').bxSlider({
              auto: 'true',
			  slideWidth: 378,	
			  minSlides: 2,
			  maxSlides: 4,
			  slideMargin: 10
          });
        });
</script>
    <div class="bxslider-2">
		<?
		  $sql = " SELECT * FROM bannercentral3 " 
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
				  $idBannerCentral3 = $row['idBannerCentral3'];
				  $descricao = $row['descricao'];	
				  $imagem = $row['imagem'];
				  $site = $row['site'];				
				  
			  ?>
				  <div class="slide"><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" width="378" height="150" /></a></div>							  
		  <? 
			  }
		  }
		?>
	</div>	    
</div>