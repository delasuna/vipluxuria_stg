<script type="text/javascript">
	  $(document).ready(function(){	
		  $("#slider").easySlider({
			  auto: true, 
			  continuous: true,
			  numeric: false
		  });
	  });	
</script> 
<div id="container">
      <div id="content">
          <div id="slider"> 
              <ul>
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
                              <li> <a href="<?=$site?>" target="_blank"><img src="<?="sistema/content/".$imagem?>" width="924" height="300"/></a></li>				
                              
                      <? 
                          }
                      }
                  ?>
              </ul>
          </div> <!-- fim slider -->
      </div> <!-- fim content -->
  </div> <!-- fim container -->