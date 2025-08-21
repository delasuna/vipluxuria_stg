<script language="JavaScript">
function resetFields(whichform) { 
  for (var i=0; i<whichform.elements.length; i++) { 
    var element = whichform.elements[i]; 
    if (element.type == "submit") continue; 
    if (!element.defaultValue) continue; 
    element.onfocus = function() { 
      if (this.value == this.defaultValue) { 
      this.value = ""; 
      } 
    } 
    element.onblur = function() { 
      if (this.value == "") { 
      this.value = this.defaultValue; 
      } 
    } 
  } 
} 

window.onload = prepareForms;
function prepareForms() { 
  for (var i=0; i<document.forms.length; i++) { 
    var thisform = document.forms[i]; 
    resetFields(thisform); 
  }  
}
</script>

<div class="area-box">
<form id="form1" name="form1" method="post" action="/conteudo/mulheres.php">
  <div class="titulo-img"><h3>Busca por Nome</h3></div>
  <input name="nome" type="text" class="campos" value="Digite o nome" />
  <br />
  <input name="Buscar" type="submit" class="botao" id="Buscar" value="Buscar" />
</form>    
  <div class="titulo-img"><h3>Assine a Newsletter</h3></div>
	<script language="JavaScript">
	function assinarRemoverNews(object) {
		document.formNews.acao.value = object;
		document.formNews.submit();
	}
	</script>
    <p>Cadastre seu e-mail e fique atualizado.</p>
<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php">
	<input type="hidden" name="acao" value="">	
    <input name="email" type="text" class="campos" value="Digite seu E-mail" /><br/>
	<input type="button" name="assinarNews" value="Assinar" class="botao" onClick="assinarRemoverNews('assinar')"/>
	<input type="button" name="removerNews" value="Remover" class="botao" onClick="assinarRemoverNews('remover')"/>
</form>	
</div>

<div class="area-box">
	<div class="titulo-img"><h3>Vip Interativo</h3></div>
    <ul>
      <li><a href="/vip_enquetes.php">Vip Enquetes</a></li>
      <li><a href="/vip_blog.php">Vip Blog</a></li>
    </ul>
        
</div>

<div class="area-box">
<div class="titulo-img"><h3>Lojas e Sex Shops</h3></div>
    <p><a href="/lojas_sexshops.php">Aqui você encontra as melhores Lojas e Sex Shops de Porto Alegre e do Estado do Rio Grande do Sul.</a></p> 
</div>

<div class="area-box">
	<div class="titulo-img"><h3>Redes Sociais</h3></div>
	<p>Acompanhe as novidades di&aacute;rias do site atrav&eacute;s das nossas redes sociais.</p>
	<br/>
	<a href="http://www.facebook.com/vipluxuria" target="_blank"><img src="/imagens/base/ico-facebook.png" alt="Facebook" width="25" height="25" border="0"></a>
	<a href="http://www.orkut.com.br/Main#Profile.aspx?uid=10836632598100585604" target="_blank"><img src="/imagens/base/ico-orkut.png" alt="Orkut" width="25" height="25" border="0"></a>
	<a href="https://twitter.com/#!/vipluxurianews" target="_blank"><img src="/imagens/base/ico-twitter.png" alt="Twitter" width="25" height="25" border="0"></a>
</div>
<div class="clear"></div>
<?
if ($_REQUEST["acao"] == "assinar") {
	$email = $_POST["email"]; 
	
	if (email != "") {
		$sql = " INSERT INTO newsletter (email) VALUES ('" . $email . "');"; 
		$resultado = mysql_query($sql, $conexao);
		echo "'<script>alert('Você foi adicionado com sucesso!');</script>";
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

