<div id="slider-content">
<script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider').bxSlider({
              auto: 'true',
			  mode: 'fade'
          });
        });
</script>
    <ul class="bxslider">
	<?
	  $sql = " SELECT * FROM bannercentral2 " 
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
			  $idBannerCentral2 = $row['idBannerCentral2'];
			  $descricao = $row['descricao'];	
			  $imagem = $row['imagem'];
			  $site = $row['site'];				
			  
		  ?>
		      <li><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" width="1000" height="250" /></a></li>							  
	  <? 
		  }
	  }
	?>
	
    </ul>
</div>