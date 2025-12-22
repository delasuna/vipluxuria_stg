<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Vip Luxúria • Em Manutenção</title>
    <meta name="description" content="Estamos realizando uma atualização em nosso site. Voltamos em breve.">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none;
        }

        html, body {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            color: #f2f2f2;
            background: radial-gradient(circle at top, #1a0f12, #0b0b0b 70%);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .manutencao-wrapper {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .manutencao-box {
            max-width: 540px;
            width: 100%;
            padding: 45px 35px;
            text-align: center;
            border-radius: 14px;
            background: linear-gradient(180deg, rgba(20,20,20,0.85), rgba(5,5,5,0.95));
            box-shadow:
                0 0 60px rgba(0,0,0,0.8),
                inset 0 0 0 1px rgba(202,162,77,0.15);
        }

        .manutencao-box h1 {
            font-size: 34px;
            font-weight: 600;
            letter-spacing: 1.5px;
            margin-bottom: 18px;
            color: #D15295; /* dourado */
        }

        .divider {
            width: 90px;
            height: 2px;
            margin: 22px auto;
            background: #D15295;
        }

        .manutencao-box p {
            font-size: 16px;
            line-height: 1.7;
            color: #d0d0d0;
        }

        .manutencao-box p + p {
            margin-top: 14px;
        }

        .status {
            margin-top: 28px;
            font-size: 13px;
            letter-spacing: 0.5px;
            color: #888;
        }

        .luxury-accent {
            margin-top: 10px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #D15295;
        }
    </style>
</head>

<body oncontextmenu="return false">
    <div class="manutencao-wrapper">
        <div class="manutencao-box">
            <h1>Em Manutenção</h1>

            <div class="divider"></div>

            <p>
                O Vip Luxúria está passando por uma atualização de versão para oferecer
                uma experiência ainda mais segura, estável e refinada.
            </p>

            <p>
                Nosso retorno acontecerá em breve.
            </p>

            <div class="status">
                © <?= date('Y') ?> Vip Luxúria
            </div>

            <div class="luxury-accent">
                sofisticação • discrição • exclusividade
            </div>
        </div>
    </div>

    
</body>
</html>
