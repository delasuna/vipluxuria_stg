<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="index,follow">
	<meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
	<meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

	<title>Formulário de Atualização</title>

	<style>
		.encontre_box {
			max-width: 500px;
			margin: 0 auto;
		}
		.tituloForm {
			font-size: 18px;
			color: #4275A6;
			margin-top:0px;
			margin-bottom: 10px;
			height: 25px;
			display: inline-block; 
		}
		.lbl {
			display: inline-block; 
			width: 80px;
			height: 27px;
		}
		.lbl2 {
			display: inline-block; 
			width: 156px;
			height: 27px;
		}
		
		.btn {
			font-size:21px;
			width: 260px;
			font-family:Comic Sans MS;
			font-weight:normal;
			margin: 0 auto;
			cursor:pointer;
			
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border-radius:4px;
			margin-left: 100px;
			padding:4px 12px;
			text-decoration:none;
			letter-spacing: 1px;
			border:1px solid #dcdcdc;
			color:#ffffff;
		
			background: linear-gradient(#4682B4,#3A5484 ); /* Standard syntax */
			background: -webkit-linear-gradient(#4682B4,#3A5484 ); /* For Safari 5.1 to 6.0 */
			background: -o-linear-gradient(#4682B4,#3A5484 ); /* For Opera 11.1 to 12.0 */
			background: -moz-linear-gradient(#4682B4,#3A5484 ); /* For Firefox 3.6 to 15 */
			filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='#4682B4', EndColorStr='#3A5484'); /* For IE 6 as 9 */
		
			display:inline-block;
		/*	text-shadow:1px 1px 0px #ffffff;*/
			-webkit-box-shadow:inset 1px 1px 0px 0px #ffffff;
			-moz-box-shadow:inset 1px 1px 0px 0px #ffffff;
			box-shadow:inset 1px 1px 0px 0px #ffffff;
		}.btn:hover {
			background:-moz-linear-gradient( center top, #3A5484 1%, #4682B4 100% );
			background:-ms-linear-gradient( top, #3A5484 1%, #4682B4 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3A5484', endColorstr='#4682B4');
			background:-webkit-gradient( linear, left top, left bottom, color-stop(1%, #3A5484), color-stop(100%, #4682B4) );
			background-color:#dfdfdf;
		}.btn:active {
			position:relative;
			top:1px;
		}
		
		.separador {
			border-bottom: 1px dotted #D5D5D5;
			padding-bottom: 15px;
		}
		
		/* ESTRUTURA - BG ROSA */
		#bg-rosa{
			background-color: #FD7AA4;
			background-image: url(/imagens/estrutura/bg-rosa-topo.jpg);
			background-repeat: no-repeat;
			background-position: center top;
		}
		#topo-content {
			width: 100%;
			height: 145px;
			text-align: center;
		}
	</style>	
</head>

<body> 
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
	       <div id="topo-content">
                <div id="logo"> <a href="/acompanhantes_porto_alegre.php"><img src="/imagens/estrutura/vip-luxuria-logo.png" alt="Vip Lux&uacute;ria" width="230" height="98" /></a>
              	</div>
                <div id="lettering">
                	<img src="/imagens/estrutura/lettering.png" alt="O guia er&oacute;tico mais completo do Brasil" />
                </div>
                <div class="clear"></div>           
            </div>
        </div>
	</div>
	<div id="conteudo">
		<div style="text-align:center;">
			<h1>Formulário de Atualização de Perfil</h1>
		</div>
		<p> 
		<form name="form2" action="mail.php"  method="post" enctype="multipart/form-data" >
			<fieldset class="encontre_box">
				<div>
					<label for="name" class="tituloForm" >Informe seu nome, e-mail e telefone abaixo de acordo com o que está no site VipLuxúria. <span style="color:red;">Estes campos são obrigatórios </span>e servem para consultar em caso de dúvida.</label><BR><BR>
					<BR>
				</div>
				<div>
					<label class="lbl" style="color:red;width: 150px;">Nome (obrigatório):</label>
					<input type="text" id="nomeBD" name="nomeBD" class="input" size="42" tabindex="1" required=""  aria-required="true">
				</div>
				<div>
					<label class="lbl" style="color:red;width: 150px;">E-mail (obrigatório):</label>
					<input type="email" id="emailBD" name="emailBD" class="input" size="42" tabindex="1"  required=""  aria-required="true">
				</div>								
				<div>
					<label class="lbl" style="color:red;width: 150px;">Telefone (obrigatório):</label>
					<input type="text" id="telefoneBD" name="telefoneBD" class="input" tabindex="1"  required=""  aria-required="true">
				</div>
			</fieldset>
			<BR>
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm">Informe apenas os dados que você deseja atualizar</label><BR>
				<div>
					<label class="lbl">Nome:</label>
					<input type="text" id="nome" name="nome" class="input" size="42" tabindex="1">
				</div>
				<div>
					<label class="lbl">E-mail:</label>
					<input type="email" id="email" name="email" class="input" size="42" tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Telefone:</label>
					<input type="text" id="telefone" name="telefone" class="input" tabindex="1" >
				</div>
				<div>
					<label class="lbl">Telefone 2:</label>
					<input type="text" id="telefone2" name="telefone2" class="input" tabindex="1">
				</div>
			</fieldset>
			<BR>
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm">Como Sou - Informe apenas os dados que você deseja atualizar</label><BR>
				<div>
					<label class="lbl">Sou:</label>
					<input type="radio" id="tipo" name="tipo" class="input" value="Loira" tabindex="1">Loira
					<input type="radio" id="tipo" name="tipo" class="input" value="Morena" tabindex="1">Morena
					<input type="radio" id="tipo" name="tipo" class="input" value="Mulata" tabindex="1">Mulata
				</div>								
				<div>
					<label class="lbl">Idade:</label>
					<input type="text" id="idade" name="idade" class="input" tabindex="1">
				</div>
				<div>
					<label class="lbl">Altura:</label>
					<input type="text" id="altura" name="altura" class="input" tabindex="1">
				</div>
				<div>
					<label class="lbl">Peso:</label>
					<input type="text" id="peso" name="peso" class="input" tabindex="1">
				</div>
				<div>
					<label class="lbl">Olhos:</label>
					<input type="text" id="olhos" name="olhos" class="input" tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Cabelos:</label>
					<input type="text" id="cabelos" name="cabelos" class="input" tabindex="1">
				</div>								
				<div>
					<label class="lbl">Busto:</label>
					<input type="text" id="busto" name="busto" class="input" tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Quadril:</label>
					<input type="text" id="quadril" name="quadril" class="input" tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Cintura:</label>
					<input type="text" id="cintura" name="cintura" class="input" tabindex="1">
				</div>								
				<div>
					<label class="lbl">Pés:</label>
					<input type="text" id="pes" name="pes" class="input" tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Manequim:</label>
					<input type="text" id="manequim" name="manequim" class="input" tabindex="1">
				</div>								
				
			</fieldset>
			<BR>
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm">O que faço - Informe apenas os dados que você deseja atualizar</label><BR>
				<div>
					<label class="lbl2">Beijo na Boca:</label></label>
					<input type="radio" id="beijoBoca" name="beijoBoca" class="input" value="Sim"  tabindex="1">Sim
					<input type="radio" id="beijoBoca" name="beijoBoca" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="beijoBoca" name="beijoBoca" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Faço Oral:</label></label>
					<input type="radio" id="oral" name="oral" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="oral" name="oral" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="oral" name="oral" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Faço Anal:</label></label>
					<input type="radio" id="anal" name="anal" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="anal" name="anal" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="anal" name="anal" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Faço Dominação:</label></label>
					<input type="radio" id="dominacao" name="dominacao" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="dominacao" name="dominacao" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="dominacao" name="dominacao" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Faço Inversão:</label></label>
					<input type="radio" id="inversao" name="inversao" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="inversao" name="inversao" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="inversao" name="inversao" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Atendo Eles:</label></label>
					<input type="radio" id="atendoEles" name="atendoEles" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="atendoEles" name="atendoEles" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="atendoEles" name="atendoEles" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Atendo Elas:</label></label>
					<input type="radio" id="atendoElas" name="atendoElas" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="atendoElas" name="atendoElas" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="atendoElas" name="atendoElas" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Atendo Casais:</label></label>
					<input type="radio" id="atendoCasais" name="atendoCasais" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="atendoCasais" name="atendoCasais" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="atendoCasais" name="atendoCasais" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Tenho acessórios:</label></label>
					<input type="radio" id="acessorios" name="acessorios" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="acessorios" name="acessorios" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="acessorios" name="acessorios" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Disponível pra Eventos:</label></label>
					<input type="radio" id="eventos" name="eventos" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="eventos" name="eventos" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="eventos" name="eventos" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Disponível pra Viagens:</label></label>
					<input type="radio" id="viagens" name="viagens" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="viagens" name="viagens" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="viagens" name="viagens" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Tenho amigas:</label></label>
					<input type="radio" id="tenhoAmigas" name="tenhoAmigas" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="tenhoAmigas" name="tenhoAmigas" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="tenhoAmigas" name="tenhoAmigas" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
				<div>
					<label class="lbl2">Atendo 24 horas:</label></label>
					<input type="radio" id="atende24horas" name="atende24horas" class="input" value="Sim" tabindex="1">Sim
					<input type="radio" id="atende24horas" name="atende24horas" class="input" value="Não" tabindex="1">Não
					<input type="radio" id="atende24horas" name="atende24horas" class="input" value="Talvez" tabindex="1">Talvez
				</div>								
			</fieldset>
			<BR>
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm">Atendimento - Informe apenas os dados que você deseja atualizar</label><BR>
				<div>
					<label class="lbl" style="display: table-cell; ">Mensagem:</label></label>
					<textarea name="mensagem1" id="mensagem1" class="form-control" rows="6" cols="55" tabindex="1"></textarea>
					<BR><BR>
				</div>								
				
				<div>
					<label class="lbl">Horários:</label></label>
					<input type="text" id="horario" name="horario" class="input"  size="41"  tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Cachê:</label></label>
					<input type="text" id="cache" name="cache" class="input"  size="41"  tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Locais:</label></label>
					<input type="text" id="locais" name="locais" class="input"  size="41"  tabindex="1" >
				</div>								
				<div>
					<label class="lbl">Cidades:</label></label>
					<input type="text" id="cidades" name="cidades" class="input"  size="41"  tabindex="1" >
				</div>								
				
			</fieldset>
			<BR>
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm"  style="height: 50px;">Imagens - <span style="color:red;">As fotos devem ter o tamanho de até 800KB e ter a extensão .jpg ou .jpeg</span></label><BR>
				<div>
					<label class="lbl">Capa:</label></label>
					<input type='file' name='imagemCapa' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 1:</label></label>
					<input type='file' name='imagem1' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 2:</label></label>
					<input type='file' name='imagem2' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 3:</label></label>
					<input type='file' name='imagem3' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 4:</label></label>
					<input type='file' name='imagem4' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 5:</label></label>
					<input type='file' name='imagem5' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 6:</label></label>
					<input type='file' name='imagem6' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 7:</label></label>
					<input type='file' name='imagem7' size='25'>
				</div>								
				<div>
					<label class="lbl">Imagem 8:</label></label>
					<input type='file' name='imagem8' size='25'>
				</div>								
				
				<div class="separador"></div>
				<BR>
				<input type="submit" class="btn" value="Clique aqui para Enviar">
				<BR><BR>					
			</fieldset>
			
			<!--
			<fieldset class="encontre_box">
				<label for="name" class="tituloForm">Atendimento - Informe apenas os dados que você deseja atualizar</label><BR>
				<div>
					<label>Mostra o Rosto:</label>
					<input type="radio" id="mostraRosto" name="mostraRosto" class="input" value="Sim">
					<input type="radio" id="mostraRosto" name="mostraRosto" class="input" value="Não">
				</div>
				<div>
					<label>Aceito Cartão:</label>
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Sim">
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Não">
				</div>
				<div>
					<label>Atendo Hotéis</label>
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Sim">
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Não">
				</div>
				<div>
					<label>Atendo Motéis</label>
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Sim">
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Não">
				</div>								
				<div>
					<label></label>Atendo Domicílio</label>
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Sim">
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Não">
				</div>								
				<div>
					<label>Atendo Local Próprio</label></label>
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Sim">
					<input type="radio" id="aceitoCartao" name="aceitoCartao" class="input" value="Não">
				</div>								
				
			</fieldset>
			<BR>
			-->
		</form>

	</div> 
</div>
</body>
</html>