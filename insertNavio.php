<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2>Adicionar Navio</h2>

<form name="dadosNavio" action="connection.php" method="POST">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md10 col-lg-8">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Nome</label>
                            <input class="form-control" type="text" name="nome" value="" placeholder="Nome" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Capacidade</label>
                            <input class="form-control" type="text" name="capacidade" value="" placeholder="Capacidade em toneladas" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Comprimento</label>
                            <input class="form-control" type="text" name="comprimento" value="" placeholder="Comprimento em metros" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Calado</label>
                            <input class="form-control" type="text" name="calado" value="" placeholder="Calado" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="action" value="inserirNavio" />
                            <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include (FOOTER_TEMPLATE);?>
