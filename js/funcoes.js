function mascaraCEP(t, mask){
	 var i = t.value.length;
	 var saida = mask.substring(1,0);
	 var texto = mask.substring(i)

	 if (texto.substring(0,1) != saida){
		 t.value += texto.substring(0,1);
	 }
 }

function mascaraTelefone(telefone){ 
	if(telefone.value.length == 0)
		telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
	if(telefone.value.length == 3)
		telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
	if(telefone.value.length == 9)
		telefone.value = telefone.value + '-'; //quando o campo já tiver 9 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
}
	
function somenteNumero() { 
	if (event.keyCode<48 || event.keyCode>57) { 
		return false; 
	} 
} 

	
function mostraMenuUsuario() { 
	if (document.getElementById("menuUsuarioTopo").style.display == "block")
		document.getElementById("menuUsuarioTopo").style.display = "none";
	else
		document.getElementById("menuUsuarioTopo").style.display = "block";
} 