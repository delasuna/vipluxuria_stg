function addEvent( obj, type, fn ) {
	if ( obj.attachEvent ) {
		obj['e'+type+fn] = fn;
		obj[type+fn] = function(){obj['e'+type+fn]( window.event );}
		obj.attachEvent( 'on'+type, obj[type+fn] );
	} else
		obj.addEventListener( type, fn, false );
}
function removeEvent( obj, type, fn ) {
	if ( obj.detachEvent ) {
		obj.detachEvent( 'on'+type, obj[type+fn] );
		obj[type+fn] = null;
	} else
		obj.removeEventListener( type, fn, false );
}
function isNumberKey(evt) {
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}


/**** Descrição.: formata um campo do formulário de* acordo com a máscara informada...
* Parâmetros: - objForm (o Objeto Form)
* - strField (string contendo o nome do textbox) - alterado, campo não existe mais
* - sMask (mascara que define o formato que o dado será apresentado, 
* usando o algarismo "9" para definir números e o símbolo "!" para qualquer caracter...
* - evtKeyPress (evento)
* Uso.......: <input type="textbox" name="xxx".....
* onkeypress="return txtBoxFormat(document.rcfDownload, 'str_cep', '99999-999', event);">
* Observação: As máscaras podem ser representadas como os exemplos abaixo:
* CEP -> 99.999-999
* CPF -> 999.999.999-99
* CNPJ -> 99.999.999/9999-99
* Data -> 99/99/9999
* Tel Resid -> (99) 999-9999
* Tel Cel -> (99) 9999-9999
* Processo -> 99.999999999/999-99
* C/C -> 999999-!
* E por aí vai...
***/
function txtBoxFormat(sMask, evtKeyPress) {     
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;     

    if(window.event) { // Internet Explorer       
        nTecla = evtKeyPress.keyCode; 
    } else if(evtKeyPress.which) { 
        // Nestcape / firefox       
        nTecla = evtKeyPress.which;     
    }    

    //se for backspace não faz nada    
    if (nTecla != 8 && nTecla != 37 && nTecla != 39){     
        sValue = evtKeyPress.srcElement.value;
//        sValue = document.getElementById(strField).value;

        // Limpa todos os caracteres de formatação que     
        // já estiverem no campo.     
        sValue = sValue.toString().replace( "-", "" );     
        sValue = sValue.toString().replace( "-", "" );     
        sValue = sValue.toString().replace( ".", "" );     
        sValue = sValue.toString().replace( ".", "" );     
        sValue = sValue.toString().replace( "/", "" );     
        sValue = sValue.toString().replace( "/", "" );     
        sValue = sValue.toString().replace( "(", "" );     
        sValue = sValue.toString().replace( "(", "" );     
        sValue = sValue.toString().replace( ")", "" );     
        sValue = sValue.toString().replace( ")", "" );     
        sValue = sValue.toString().replace( " ", "" );     
        sValue = sValue.toString().replace( " ", "" );     
        fldLen = sValue.length;     
        mskLen = sMask.length;     
        i = 0;     
        nCount = 0;     
        sCod = "";     
        mskLen = fldLen;     

        while (i <= mskLen) {       
            bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))       
            bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))       
            if (bolMask) {         
                sCod += sMask.charAt(i);         
                mskLen++; 
            } else { 
                sCod += sValue.charAt(nCount);         
                nCount++;       
            }       
            i++;     
        }     

//        document.getElementById(strField).value = sCod;
        evtKeyPress.srcElement.value = sCod;     

        if (nTecla != 8 && nTecla != 37 && nTecla != 39){     
            // backspace       
            if (sMask.charAt(i-1) == "9") { 
                // apenas números...         
                return ((nTecla > 47) && (nTecla < 58)); 
            } // números de 0 a 9       
              else { 
                // qualquer caracter...         
                return true;       
            } 
        } else {       
            return true;     
        }    
    }//fim do if que verifica se é backspace
}//Fim da Função Máscaras Gerais


// retira caracteres invalidos da string
function limpar(valor, validos) {
    var result = "";
    var aux;
    for (var i=0; i < valor.length; i++) {
        aux = validos.indexOf(valor.substring(i, i+1));
        if (aux>=0) {
            result += aux;
        }
    }
    return result;
}


//Formata número tipo moeda usando o evento onKeyDown
function formataValor2(campo,tammax,teclapres,decimal) {
    var tecla = teclapres.keyCode;
    vr = limpar(campo.value,"0123456789");
    tam = vr.length;
    dec=decimal


    if (tam < tammax && tecla != 8){ 
        tam = vr.length + 1 ; 
    }

    if (tecla == 8 ) { 
        tam = tam - 1 ; 
    }

    if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ) {

        if ( tam <= dec ) { 
            campo.value = vr ; 
        }
        if ( (tam > dec) && (tam <= 5) ){
            campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam ) ; 
        }
        if ( (tam >= 6) && (tam <= 8) ){
            campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
        }
        if ( (tam >= 9) && (tam <= 11) ){
            campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
        }
        if ( (tam >= 12) && (tam <= 14) ){
            campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
        }
        if ( (tam >= 15) && (tam <= 17) ){
            campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;
        }
    } 

}


