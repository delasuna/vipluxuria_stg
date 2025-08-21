<div class="carousel">
	<div class="slider-content-carousel">
		<script type="text/javascript">
		        $(document).ready(function(){
		          $('.bxslider-carousel').bxSlider({
		              auto: 'true',
					  slideWidth: 370,	
					  minSlides: 3,
					  maxSlides: 6,
					  slideMargin: 10
		          });
		        });
		</script>
	    <div class="bxslider-carousel">
						<?
						$sqlCarrossel = " SELECT * FROM mulher  WHERE flagAtivo = 'Sim' and flagCarrossel = 'S'"     
							 . " ORDER BY flagPreferencial desc, rand(); ";
		
										 
						$resultadoCarrossel = mysql_query($sqlCarrossel, $conexao);
						if(!$resultadoCarrossel){
							die("Impossível visualizar as anunciantes: " . mysql_error() . '<br>');
						}
											
						$stsCarrossel = mysql_query($sqlCarrossel);
						$registrosCarrossel = mysql_num_rows($stsCarrossel);
		
						if ($registrosCarrossel>0) {
							while($row = mysql_fetch_array($resultadoCarrossel)) {
								$idMulher = $row['idMulher'];
								$nome = $row['nome'];	
								$sobrenome = $row['sobrenome'];
								$imagemCapa = $row['imagemCapa'];				
				
							
								?>
								<a href="/perfil/<?=$idMulher?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>">
									<img src="<?="/sistema/content/".$imagemCapa?>" width="370" />
									<p class="nome"><?=$nome?> <?=$sobrenome?></p>
								</a>
								<? 	 
							}
						}
						?>	 
		</div>
	</div>
</div><!-- Carousel -->