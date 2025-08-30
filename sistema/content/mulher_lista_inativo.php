<?php require_once("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

    <title>Vip Luxúria - Acompanhantes Porto Alegre</title>

    <!-- CSS -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../css/config.css" type="text/css" />
    <link rel="stylesheet" href="../css/text.css" type="text/css" />
    <link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/content_sis.css">
    <link rel="stylesheet" type="text/css" href="../css/header_sis.css">    

    <!-- JS -->
    <script type="text/javascript" src="../imagens/js/prototype.js"></script>
    <script type="text/javascript" src="../imagens/js/scriptaculous.js?load=effects"></script>
    <script type="text/javascript" src="../imagens/js/lightbox.js"></script>
    <script language="javascript" src="../js/checkall.js"></script>

    <!-- Cufon -->
    <script src="/css-js/cufon-yui.js"></script>
    <script type="text/javascript" src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('#navmenu-h');
        Cufon.replace('#slogan');
        Cufon.replace('h1, h2, h3, h4');
        Cufon.replace('.menu-rodape');
    </script>

    <!-- Functions -->
    <script src="/css-js/functions.js" type="text/javascript"></script>
</head>

<body> 
<a name="inicio"></a> 
<div class="voltar-inicio">
    <a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30" border="0" /></a>
</div>

<div id="tudo">
    <div id="conteudo">
        <div id="topo">
            <div id="topo-content">
                <?php include("php/topo-sistema.php"); ?>
            </div>
        </div>
        <div id="header">
            <div id="header-content">
                <?php include("php/header-sistema.php"); ?>            
            </div>
        </div>
        <div id="menu">
            <div id="menu-content">
                <?php include("php/menu-sistema.php"); ?>            
            </div>
        </div>

        <div id="titulo">
            <div id="titulo-content">
                <h1>Anunciantes Mulheres - Inativos</h1>
            </div>
            <div class="traco"></div>
        </div>
    
        <div id="principal">
            <div id="principal-topo"></div>

            <div id="principal-content">
                <div id="coluna-esquerda-full">
                    <p>
                    <?php
                        include("../inc/common.php");
                        pageTitle("", "Lista");
                    ?>
                    
                    <script type="text/javascript">
                        function excluir() {
                            if (confirm('Excluir registros selecionados?')) {
                                document.frm.action = "mulher_excluir.php";
                                document.frm.submit();
                            }
                        }
                    </script>    

                    <?php
                        $conn = new db();
                        $conn->open();
                        
                        $pg = getParam("pagina");
                        if ($pg == "") $pg = 1;
                        
                        if (getParam("clear")==1) {
                            setSession("sOrder","");
                            setSession("where","");
                            setSession("pagina_atual","");
                            setSession("numeroRegistros",""); 
                        }
                        
                        if (getParam("numeroRegistros") != "") {
                            setSession("numeroRegistros",getParam("numeroRegistros"));    
                        }
                        setSession("redirectAnunciante","mulher_lista_inativo.php");
                        
                        if ($_SERVER['PHP_SELF'] != getSession("pagina_atual")) {
                            $mesma_pagina = false;
                            setSession("pagina_atual",$_SERVER['PHP_SELF']);
                        } else {
                            $mesma_pagina = true;
                        }
                        
                        $iSort = getParam("Sorting");
                        $iSorted = getParam("Sorted");
                        if ((!$iSort)&&(!$mesma_pagina)) {
                            if (getSession("sOrder") == "") {
                                $iSort = 2;
                                $iSorted = "";
                            }
                        }
                        if ($iSort) {
                            if ($iSort == $iSorted) {
                                $sDirection = " DESC";
                                $sSortParams = "Sorting=" . $iSort . "&Sorted=" . $iSort . "&";
                            } else {
                                $sDirection = " ASC";
                                $sSortParams = "Sorting=" . $iSort . "&Sorted=&";
                            }
                            if ($iSort == 2) setSession("sOrder"," order by nomeUrl" . $sDirection); 
                            if ($iSort == 3) setSession("sOrder"," order by email" . $sDirection); 
                            if ($iSort == 4) setSession("sOrder"," order by telefone" . $sDirection);
                            if ($iSort == 5) setSession("sOrder"," order by flagAtivo" . $sDirection);
                        }
                        
                        $sql = "SELECT * FROM mulher WHERE flagAtivo = 'Nao' " . getSession("sOrder");
                        
                        if (getSession("numeroRegistros") == "Todos") {
                            $rs = new query($conn, $sql); 
                            $numeroRegistros = $rs->numrows();
                        } else if (getSession("numeroRegistros") != "") {
                            $numeroRegistros = getSession("numeroRegistros");
                        } else {
                            $numeroRegistros = 15;
                        }
                        
                        $rs = new query($conn, $sql, $pg, $numeroRegistros); 
                        $pg_ant = $pg-1;
                        $pg_prox = $pg+1;
                    ?>

                    <form name="form2" method="post" action="mulher_lista_inativo.php">
                        <div align="right">
                            <table>
                                <tr>
                                    <td class="LabelFONT">
                                        <input type="hidden" name="rodou" value="s">            
                                        Registros por página:
                                    </td>
                                    <td class="campoSelect">
                                        <select name="numeroRegistros" size="1">
                                            <option value="Todos">Todos</option>
                                            <option value="15" <?php echo (getSession("numeroRegistros")==15 || getSession("numeroRegistros")=="") ? "selected" : ""; ?>>15</option>
                                            <option value="30" <?php echo (getSession("numeroRegistros")==30) ? "selected" : ""; ?>>30</option>
                                            <option value="60" <?php echo (getSession("numeroRegistros")==60) ? "selected" : ""; ?>>60</option>
                                        </select>
                                    </td>
                                    <td>            
                                        <input type="submit" name="botaoOk" value=" OK " style="cursor:pointer;">
                                    </td>            
                                </tr>
                            </table>
                        </div>
                    </form>
                    
                    <div class='acoes2'>
                        <table width="100%">
                            <tr>
                                <td>
                                    &nbsp; <a class='botao' href='mulher_edicao.php'>&nbsp;Novo&nbsp;</a>
                                    <a class='botao' href='javascript:excluir()'>&nbsp;Excluir&nbsp;</a>                
                                </td>
                                <td align="right">
                                    <?php if ($pg>1) { ?>
                                        &nbsp; <a class='botao' href="<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_ant"; ?>">&nbsp;<?php echo LISTA_ANTERIOR; ?>&nbsp;</a>
                                    <?php } ?>                
                                    <?php if ($pg<$rs->totalpages()) { ?>
                                        <a class='botao' href="<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_prox"; ?>">&nbsp;<?php echo LISTA_PROXIMO; ?>&nbsp;</a>    
                                    <?php } ?>                        
                                </td>                                            
                            </tr>
                        </table>
                    </div>
                    
                    <div align="center">
                        <form name="frm" method="post">
                        <?php
                            if ($rs->numrows()>0) {
                                echo "<table width='100%' border='0'> ";
                                echo "  <tr>";
                                echo "    <td class='DataFONT' align='right' width='53%'>&nbsp;Página ".$pg." de ".$rs->totalpages()."</td>";
                                echo "    <td class='DataFONT' align='right' width='47%'>&nbsp;Foram encontrados " . $rs->numrows() . " registros.</td>";
                                echo "  </tr>";
                                echo " </table>";
                            } else {
                                echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
                            }
                    
                            $table = new Table("","100%",4);
                            $table->addColumnHeader("<input type=\"checkbox\" name=\"checkall\" onclick=\"CheckAll()\">");
                            $table->addColumnHeader("Nome",true,"35%", "L");
                            $table->addColumnHeader("E-mail",true,"30%","L");
                            $table->addColumnHeader("Telefone",true,"20%","L");
                            $table->addColumnHeader("Ativo",true,"15%","L");
                            $table->addRow();
                        
                            while ($rs->getrow()) {
                                $id = $rs->field("idMulher");
                                $table->addData("<input type=\"checkbox\" name=\"sel[]\" value=\"$id\">");
                                $table->addData(addLink(htmlspecialchars($rs->field("nomeUrl")), "mulher_edicao.php?id=$id&pagina=$pg","Clique para editar"));
                                $table->addData(htmlspecialchars($rs->field("email"))); 
                                $table->addData(htmlspecialchars($rs->field("telefone")));
                                $table->addData(htmlspecialchars($rs->field("flagAtivo")));
                                $table->addRow();    
                            }
                        
                            if ($rs->numrows()>0) {
                                echo $table->writeHTML();
                                echo "<table width='100%' border='0'> ";
                                echo "  <tr>";
                                echo "    <td class='DataFONT' align='right' width='53%'>&nbsp;Página ".$pg." de ".$rs->totalpages()."</td>";
                                echo "    <td class='DataFONT' align='right' width='47%'>&nbsp;</td>";
                                echo "  </tr>";
                                echo " </table>";
                            }
                        ?>
                        </form>
                    </div>
                    
                    <?php $conn->close(); ?>
                    </p>
                </div>
            </div>

            <div id="principal-rodape"></div>
            <div class="clear"></div>             
        </div>
    </div>

    <div id="rodape">
        <div class="traco"></div>
        <div id="rodape-content">
            <?php include("php/menu-rodape-sistema.php"); ?>
        </div>
    </div>
</div> 

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-3970078-1']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<script type="text/javascript">
 Cufon.now();
</script>

</body>
</html>
