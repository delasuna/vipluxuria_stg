// Tudo que tem que fazer quando está carregando
function _pageLoad() {
	coloreInputs();
}

// Tricks ...
function addEvent(elm, evType, fn, useCapture)	{
	if(elm.addEventListener) {
		elm.addEventListener(evType, fn, useCapture);
		return true;
	} else if(elm.attachEvent) {
		var r = elm.attachEvent('on' + evType, fn);
		return r;
	} else {
		elm['on' + evType] = fn;
	}
}

function getEventTag(e) {
	if(e.srcElement) elm = e.srcElement; else if(e.target) elm = e.target;
	return elm;
}

function inArray(arr,str) {
	for(i in arr) if(arr[i] == str) return true;
	return false;
}

function display(elm) {
	try {
		elm.style.display = "block";
	} catch(e) {
		window.status = "Erro ao mostrar o elemento \n"+e;
	}
}

function hide(elm) {
	try{
		elm.style.display = "none";
	} catch(e) {
		window.status = "Erro ao ocultar o elemento \n"+e;
	}
}

function QueryString(variavel){
	qs=new Array()
	variaveis=location.search.replace(/\x3F/,"").replace(/\x2B/g," ").split("&")
	if(variaveis!=""){
		for(i=0;i<variaveis.length;i++){
			nvar=variaveis[i].split("=")
			qs[nvar[0]]=unescape(nvar[1])
		}
	}

    return qs[variavel]
}


function correctHeight() {
	// Corrige no ie 7
	if(document.all) {
		arrDivs = document.getElementsByTagName("div");
		for(i in arrDivs) {
			if(!arrDivs[i].className) continue;
			if(arrDivs[i].className.match("chamadaHolder")) {
				arrDivs[i].style.display = "none";
			}
		}
	}

	var oLateral = document.getElementById("lateral");
	var oMiolo = document.getElementById("miolo");

	if(oLateral && oMiolo) {
		if(oLateral.offsetHeight > oMiolo.offsetHeight)
			oMiolo.style.height = oLateral.offsetHeight -20 +"px"; // 20 = padding
		else if(oLateral.offsetHeight < oMiolo.offsetHeight)
			oLateral.style.height = oMiolo.offsetHeight+"px";
	}
}