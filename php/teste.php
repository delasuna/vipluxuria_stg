
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
							alert(rads[i].value);
							document.formNews.acao.value = rads[i].value;
						}
					}
					alert("2="+document.formNews.acao.value);
					validaEmail2(document.getElementById("emailNews").value);
				}				
			</script>
	<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php">
					<input type="hidden" name="acao" value="">	
					<input name="emailNews" id="emailNews" type="text" class="campo-news" value="Digite seu E-mail" />
					<input type="button" name="assinarNews" value="Assinar" class="bt-news" onClick="assinarRemoverNews()"/>
					<BR><BR>
				     <input name="acaoRadio" type="radio" value="assinar" /> Cadastrar  
					 <input name="acaoRadio" type="radio" value="remover" /> Descadastrar 
					
				</form>	
				
				