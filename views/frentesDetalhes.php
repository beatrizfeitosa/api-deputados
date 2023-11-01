<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Frentes Detalhes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

    <?php
    include('header.html');
    include('menu.html');
    ?>

    <br>
    <div class="container">
        <br>
        <h2 id="frente"></h2>
        <br>

        <div class='card'>
            <div class="card-body">
                <div class="mb-3 row">
                    <h3><font size='4' color='gray'> Detalhes</font></h3>
                    <label class="col-sm-2 col-form-label"><b>Telefone</b></label>
                    <div id='telefone' class="col-sm-10"></div>
                    <label class="col-sm-2 col-form-label"><b>Situação</b></label>
                    <div id='situacao' class="col-sm-10"></div>
                    <label class="col-sm-2 col-form-label"><b>Documento</b></label>
                    <div id='documento' class="col-sm-10"></div>
                </div>
            </div>
        </div>
        <br>
        <div class='card'>
            <div class="card-body">
                <h3><font size='4' color='gray'> Coordenador</font></h3>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"><b>Nome</b></label>
                    <div id='nome' class="col-sm-10"></div>
                    <label class="col-sm-2 col-form-label"><b>Partido</b></label>
                    <div id='partido' class="col-sm-10"></div>
            </div>
        </div>

    </div>
</body>

</html>

<script src="../assets/js/frentesDetalhes.js"></script>