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
    //resetFields(thisform); 
  }  
}
</script>
		  <div id="faixa"></div><!--FAIXA-->

          <div id="topo-content">
                <div id="logo"> <a href="/acompanhantes-porto-alegre/"><img src="/imagens/estrutura/vip-luxuria-logo.png" alt="Vip Lux&uacute;ria" width="230" height="98" /></a>
              	</div><!--LOGO-->
                <div id="lettering">
                	<img src="/imagens/estrutura/lettering.png" alt="O guia er&oacute;tico mais completo do Brasil" />
                </div><!--LETTERING-->
                <div id="anunciar-busca">
                    <div id="anunciar">
                    	<a href="/como-anunciar/"><img src="/imagens/estrutura/como-anunciar.png" width="144" height="68" /></a>
                    </div><!--ANUNCIAR-->
                   <div class="busca">
					 <form id="form1" name="form1" method="post" action="/mulheres-acompanhantes-porto-alegre-poa/">
						<input name="nome" type="text" class="campo-busca" value="Busca por nome" onClick="javascript:this.value=''"  />
						<input name="Buscar" type="submit" class="bt-busca" id="Buscar" value="Buscar" />
					 </form>                
                    </div><!--BUSCA-->
                   
                </div><!--ANUNCIAR-BUSCA-->
    
                <div class="clear"></div>           
            </div><!--TOPO CONTENT"-->

<?
function tirarAcentos($string){
	//echo "teste=" . preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/"),explode(" ","a A e E i I o O u U n N c"),$string); 
}
?>