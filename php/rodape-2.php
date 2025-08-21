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
				<form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_al