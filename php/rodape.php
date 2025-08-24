<div id="faixa-destaques">
	<?php include("faixa-destaques.php"); ?>
</div>

<div id="rodape-content">  
    <div id="col-200">
		<!-- <div class="box">
        <h3>Busca por Nome</h3>
        <div class="busca" style="margin-left:-15px; margin-top:5px;">
			<form id="form1" name="form1" method="post" action="/conteudo/mulheres.php">
				<input name="nome" type="text" class="campo-busca" value="Busca por nome" />
				<input name="Buscar" type="submit" class="bt-busca" id="Buscar" value="Buscar" />
			</form> 					               
        </div>
        <br/>                        
		</div> -->
		<h3>Newsletter</h3>
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
				
				function assinarRemoverNews() {
					var rads = document.getElementsByName("acaoRadio");
					for(var i = 0; i < rads.length; i++){
						if(rads[i].checked){
							document.formNews.acao.value = rads[i].value;
						}
					}
					validaEmail2(document.getElementById("emailNews").value);
				}				
			</script>
			<p style="padding-bottom:5px;">Cadastre-se no mailing e receba as nossas atualizações através das newsletters.</p>
            <div class="news" style="margin-left:-15px; margin-top:5px;">
				<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php">
					<input type="hidden" name="acao" value="">
					<input name="emailNews" id="emailNews" type="text" class="campo-news" value="Digite seu E-mail" onClick="javascript:this.value=''" />
					<input type="button" name="assinarNews" value="Assinar" class="bt-news" onClick="assinarRemoverNews()"/>
					<BR><BR>
				     <input name="acaoRadio" type="radio" value="assinar" checked="checked" /> Cadastrar  
					 <input name="acaoRadio" type="radio" value="remover" /> Descadastrar 
					
				</form>						               
            </div><!--BUSCA-->                
    </div>
    <div id="col-790">
        <div class="col-185">
			<div class="box">
				<h3>Vip Enquetes</h3>
				<img src="/imagens/estrutura/linha.png"><br/>
                <a href="/vip-enquetes/"><img src="/imagens/estrutura/ico-enquete.png" width="163" height="68"/></a>
			</div>	
        </div>
        <div class="col-185">
			<div class="box">
			    <h3>Parceiros</h3>
				<img src="/imagens/estrutura/linha.png"><br />
				<a href="/parceiros/"><img src="/imagens/estrutura/ico-parceiros.png" width="163" height="68"/></a>
			</div>
        </div>
        <div class="col-185">
           	<div class="box">
				<h3>Lojas e Sex Shops</h3>
				<img src="/imagens/estrutura/linha.png"><br/>
				<a href="/lojas-sexshops/"><img src="/imagens/estrutura/ico-sexshops.png" width="163" height="68"/></a>
			</div>
        </div>
        <div class="col-185">
           	<div class="box">
				<h3>Redes Sociais</h3>
				<img src="/imagens/estrutura/linha.png">
				<div id="redes-sociais">
					<!-- <a href="https://www.facebook.com/Vip-Lux%C3%9Aria-529673080554391/#" target="_blank"><img src="/imagens/estrutura/ico-facebook-2.png" width="163" height="40" alt="Facebook" /></a><br/> -->                
					<a href="https://twitter.com/vipluxurianews" target="_blank"><img src="/imagens/estrutura/ico-twitter-2.png" width="163" height="40" alt="Twitter" /></a><br/>
					<!-- <a href="https://www.instagram.com/vipluxurianews/" target="_blank"><img src="/imagens/estrutura/ico-instagram-2.png" width="163" height="40" alt="Instagram" /></a> -->
				</div>
			</div>	
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
	<div id="col-2-33" style="padding-top:20px;">
		<h3>Vip Lux&uacute;ria Recomenda</h3>
		<a href="http://www.oguiaz.com.br/" target="_blank"><img src="/imagens/vip-recomenda-guia-z.png" width="200" height="75" /></a><a href="http://www.gpface.net/" target="_blank"><img src="/imagens/gp-face.png" width="200" height="75" /></a><a href="http://www.vipluxuria.com/felipepicture/" target="_blank"><img src="/imagens/felipe-picture-index.png" width="200" height="75" /></a><a href="http://www.vipluxuriagold.com" target="_blank"><img src="/imagens/vip-luxuria-gold-index.png" width="200" height="75" /></a><br/><br/><a href="/angelo-personal.php"><img src="/imagens/vip-recomenda-angelo-index.png" width="200" height="75" /></a>
    </div>	
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
		