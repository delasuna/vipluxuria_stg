<a name="rodape"></a>
<div id="faixa-destaques">
	<?php include("faixa-destaques-2.php"); ?>
</div>
<div id="rodape-content">  
    <div id="col-210">
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
			<a name="assina"></a>
            <div class="news" style="margin-left:-15px; margin-top:5px;">
				<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php">
					<input type="hidden" name="acao" value="">
					<input name="emailNews" id="emailNews" type="text" class="campo-news" value="Digite seu E-mail" onClick="javascript:this.value=''" />
					<input type="button" name="assinarNews" value="Assinar" class="bt-news" onClick="assinarRemoverNews()"/>
					<BR>
					<div class="news-radio">
				     <input name="acaoRadio" type="radio" value="assinar" checked="checked" /> Cadastrar
					 <input  name="acaoRadio" type="radio" value="remover" /> Descadastrar 
					</div>
				</form>						               
            </div><!--BUSCA-->                
    </div>
    <div id="col-800">
        <div class="col-146">
			<a href="/vip-luxuria-acompanhantes-porto-alegre-poa/"><img src="/imagens/estrutura/01-conheca.png" alt="Conheça o Vip Luxúria" /></a>
        </div>
		<div class="linha-vertical-2"></div>
        <div class="col-146">
			<a href="/vip-enquetes/"><img src="/imagens/estrutura/02-enquetes.png" alt="Parcipe da Enquete do Vip Luxúria"/></a>
        </div>
		<div class="linha-vertical-2"></div>		
        <div class="col-146">
			<a href="https://twitter.com/vipluxuriacom" target="_blank"><img src="/imagens/estrutura/04-twitter.png"/ alt="Siga-nos no Twitter"></a>      
        </div>
		<div class="linha-vertical-2"></div>	        
		<div class="col-146">
			<a href="https://www.instagram.com/amigas_do_vip?igsh=MWF6OXo1YTh5emxwNg==" target="_blank"><img src="/imagens/estrutura/instagram.png" alt="Siga-nos no Instagram" /></a>      
        </div>        		
        <div class="clear"></div>
		<div class="linha-horizontal"></div>
        <div class="col-146">
			<a href="http://www.vipluxuria.com/m/iframe.php" target="_blank"><img src="/imagens/estrutura/03-mobile.png" alt="Acesse a versão Mobile do Vip Luxúria" /></a>
        </div> 
		<div class="linha-vertical-2"></div>               
        <div class="col-146">
			<a href="/vip-blog/"><img src="/imagens/estrutura/05-blog.png" alt="Confira o nosso blog" /></a>
        </div>
		<div class="linha-vertical-2"></div>        
		<div class="col-146">
			<a href="/parceiros/"><img src="/imagens/estrutura/06-parceiros.png" alt="Conheça os nossos parceiros" /></a>
        </div>
		<!--<div class="linha-vertical-2"></div>        
		<div class="col-146">
			<a href="/lojas-sexshops-porto-alegre-poa/"><img src="/imagens/estrutura/07-sex.png"/></a>
        </div> -->
		<div class="linha-vertical-2"></div>		
        <div class="col-146">
			<a href="/swing-porto-alegre-poa/"><img src="/imagens/estrutura/08-swing.png" alt="Classificados de Swing Porto Alegre" /></a>
        </div>
		<div class="clear"></div>	
    </div>
    <div class="clear"></div>
	<div class="linha-horizontal"></div>
	
	<div id="col-2-33" style="padding-top: 5px;">
		<h3>Recomendamos</h3>
		<ul>
			<li><a href="http://www.vipluxuriagold.com" target="_blank"><img src="/imagens/logos/vip-luxuria-gold.png" title="Vip Luxúria Gold" alt="Vip Luxúria Gold"/></a></li>
			<li><img src="/imagens/logos/felipe-picture.png" title="Felipe Picture" alt="Felipe Picture"/></li>
			<li><a href="https://www.acompanhantes61.com.br/" title="Acompanhantes Bras&iacute;lia" target="_blank"><img src="/imagens/logos/a61.png" alt="Acompanhantes de Brasília"/></a></li>
			<li><a href="https://harem69.com.br/" target="_blank"><img src="/imagens/parceiros/harem.png" title="Harem 69" alt="Harem 69"></a></li>
            <li><a href="https://www.guiaadulto.com/" target="_blank"><img src="/imagens/parceiros/guia-adulto.png" title="Fórum de Acompanhantes" alt="Fórum de Acompanhantes"/></a></li>
			<li><a href="/angelo-personal.php/"><img src="/imagens/logos/angelo-marques.png" title="Ângelo Marques Personal Trainer" alt="Ângelo Marques Personal Trainer"/></a></li>
		</ul>	
		<br/>
		<ul>
			<li><a href="https://www.foumotel.com.br/" target="_blank"><img src="/imagens/parceiros/fou-motel.png" alt="Fou Motel"></a></li>
			<li><a href="http://www.moteisvisavis.com.br/porto-alegre/" target="_blank"><img src="/imagens/parceiros/vis-a-vis.png" alt="Motel Vis-a-Vis"></a></li>
			<li><a href="https://www.motelmedieval.com.br/site/" target="_blank"><img src="/imagens/parceiros/medieval.png" alt="Medieval Motel Spa"</a></li>
			<li><a href="https://www.motelsherwood.com.br/site/" target="_blank"><img src="/imagens/parceiros/sherwood.png" alt="Sherwood Motel"></a></li>

		</ul>	
		
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
		