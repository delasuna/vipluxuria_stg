<div id="faixa-destaques">
	<?php include("faixa-destaques.php"); ?>
</div>
    	<div id="rodape-content">
  <div id="col-2-33">
   	<h3>Vip Lux&uacute;ria Recomenda</h3>
    <a href="http://www.gpface.net/" target="_blank"><img src="/imagens/gp-face.png" width="200" height="75" /></a><a href="http://www.vipluxuria.com/felipepicture/" target="_blank"><img src="/imagens/felipe-picture-index.png" width="200" height="75" /></a><a href="http://www.vipluxuriagold.com" target="_blank"><img src="/imagens/vip-luxuria-gold-index.png" width="200" height="75" /></a><a href="/angelo-personal.php"><img src="/imagens/vip-recomenda-angelo-index.png" width="200" height="75" /></a></div>        
        	<div id="col-1">
            	<h3>Busca por Nome</h3>
                <div class="busca" style="margin-left:-15px; margin-top:5px;">
					<form id="form1" name="form1" method="post" action="/conteudo/mulheres.php">
						<input name="nome" type="text" class="campo-busca" value="Busca por nome" />
						<input name="Buscar" type="submit" class="bt-busca" id="Buscar" value="Buscar" />
					</form> 					               
                </div><!--BUSCA-->
                <br/>                
                <h3>Assine a Newsletter</h3>
				<script language="JavaScript">
					function validaEmail2(field) { 
						usuario = field.substring(0, field.indexOf("@")); 
						dominio = field.substring(field.indexOf("@")+ 1, field.length); 
						
						if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1)&& (dominio.lastIndexOf(".") < dominio.length - 1)) { 
							document.formNews.submit();
						} else{ 
							alert("E-mail invalido. Informe novamente!"); 
						} 
					}
				
					function assinarRemoverNews(object) {
						document.formNews.acao.value = object;	
						validaEmail2(document.getElementById("emailNews").value);
					}				
				</script>
				
                <p>Cadastre seu e-mail e fique atualizado.</p>
                <div class="news" style="margin-left:-15px; margin-top:5px;">
					<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php">
						<input type="hidden" name="acao" value="">	
						<input name="emailNews" id="emailNews" type="text" class="campo-news" value="Digite seu E-mail" />
						<input type="button" name="assinarNews" value="Assinar" class="bt-news" onClick="assinarRemoverNews('assinar')"/>
						<!--<input type="button" name="removerNews" value="Remover" class="bt-news" onClick="assinarRemoverNews('remover')"/>-->
					</form>						               
                </div><!--BUSCA-->                
            </div>
            <div id="col-2">
            	<div class="col-2-13">
                	<h3>Vip Interativo</h3>
                    <p class="enquetes"><a href="/vip_enquetes.php">Vip Enquetes</a></p>
                    <p class="blog"><a href="/vip_blog.php">Vip Blog</a></p>
              </div>
                <div class="col-2-13">
                	<h3>Lojas e Sex Shops</h3>
                    <p><a href="/lojas_sexshops.php">As melhores Lojas e Sex Shops de Porto Alegre e do Estado do Rio Grande do Sul.</a></p>
              </div>
                <div class="col-2-13">
                	<h3>Redes Sociais</h3>
                    <p>Acompanhe as novidades do site atrav&eacute;s das nossas redes sociais.</p>
                    <div id="redes-sociais">
                    	<a href="https://www.facebook.com/Vip-Lux%C3%9Aria-529673080554391/#" target="_blank"><img src="/imagens/estrutura/ico-facebook.png" width="50" height="48" alt="Facebook" /></a>                
                		<a href="https://twitter.com/vipluxurianews" target="_blank"><img src="/imagens/estrutura/ico-twitter.png" width="50" height="48" alt="Twitter" /></a>
						<a href="https://www.instagram.com/vipluxurianews/" target="_blank"><img src="/imagens/estrutura/ico-instagram.png" width="50" height="48" alt="Instagram" /></a>
                    </div>
                </div>
                <div class="clear"></div>
             
            </div>
            <div class="clear"></div>
        </div><!--RODAPE CONTENT-->
		
<?
if ($_REQUEST["acao"] == "assinar") {
	$email = $_POST["emailNews"]; 
	
	if (email != "") {
		$sql = " SELECT * FROM newsletter WHERE email = '" . $email . "'";
		$resultado = mysql_query($sql, $conexao);
		if(!$resultado){
			die("Impossível visualizar o newsletter: " . mysql_error() . '<br>');
		}
		$sts = mysql_query($sql);
		$registros = mysql_num_rows($sts);
	
		if ($registros>0) {
				echo "'<script>alert('E-mail já cadastrado!');</script>";		
		} else {	
			$sql = " INSERT INTO newsletter (email) VALUES ('" . $email . "');"; 
			$resultado = mysql_query($sql, $conexao);
			echo "'<script>alert('Você foi adicionado com sucesso!');</script>";
		}
	}
}

if ($_REQUEST["acao"] == "remover") {
	$email = $_POST["email"]; 
	
	if (email != "") {
		$sql = " DELETE FROM newsletter WHERE email = '" . $email ."'; "; 
		$resultado = mysql_query($sql, $conexao);
		echo "'<script>alert('Você foi removido com sucesso!');</script>";
	}
	
	
}

?>
		