<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">
    <meta name="google-translate-customization" content="47516143a922ad1d-908eb38b3da0e2e8-gfbda7755c951dd96-12">
    <meta http-equiv="Cache-Control" content="no-store">
    <title><?php echo htmlspecialchars($title ?? 'Vip Luxúria - Acompanhantes Porto Alegre'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css">

    <script src="/css-js/cufon-yui.js" type="text/javascript"></script>
    <script src="/css-js/nome_400.font.js" type="text/javascript"></script>
    <script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
    <!-- Cufon -->
    <script type="text/javascript">
        Cufon.replace('h1');
        Cufon.replace('h1#titulo,#menu-rodape-content', { fontFamily: 'titulo' });
        Cufon.replace('p.nome, .nome-destaque', { fontFamily: 'nome' });
    </script>

    <?php
	function tirarAcentos($string)
	{
		return preg_replace(
			array(
				"/(á|à|ã|â|ä)/",
				"/(Á|À|Ã|Â|Ä)/",
				"/(é|è|ê|ë)/",
				"/(É|È|Ê|Ë)/",
				"/(í|ì|î|ï)/",
				"/(Í|Ì|Î|Ï)/",
				"/(ó|ò|õ|ô|ö)/",
				"/(Ó|Ò|Õ|Ô|Ö)/",
				"/(ú|ù|û|ü)/",
				"/(Ú|Ù|Û|Ü)/",
				"/(ñ)/",
				"/(Ñ)/"
			),
			explode(" ", "a A e E i I o O u U n N"),
			$string
		);
	}
	?>
</head>

<?php include_once 'age-gate.php'; ?>