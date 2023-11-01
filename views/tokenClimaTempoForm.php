<?php

include('header.html');
include('menu.html');

?>


<div class="container">
    <div class="padding-top">
        <div class="card">
            <div class="card-body">
                <form method="post" action="../controller/registerTokenController.php">
                    <div class="mb-3">
                        <label for="exampleInputToken" class="form-label">Token</label>
                        <input type="text" class="form-control" id="exampleInputToken" aria-describedby="token" name="token">
                        <div id="token" class="form-text">Insira o Token fornecido pelo site do ClimaTempo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCidadeId" class="form-label">Id da Cidade</label>
                        <input type="text" class="form-control" id="exampleInputCidadeId" name="cidadeId">
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>