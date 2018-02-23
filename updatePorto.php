<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<?php
    include 'connection.php';
    /* var_dump($_POST["nome"]); */
    $porto = selectPortoByNome($_POST["nome"]);
    /*var_dump($porto);*/
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2 class="mt-5 pt-5">Editar Porto</h2>

<form name="dadosPorto" action="connection.php" method="POST">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md10 col-lg-8">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Nome</label>
                            <input class="form-control" type="text" name="nome" value="<?=$porto["nome"]?>" placeholder="Nome" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Endereço</label>
                            <input class="form-control" type="text" name="endereco" value="<?=$porto["endereco"]?>" placeholder="Endereço" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Tipo</label>
                            <select class="form-control" name="tipo" style="width: 100%" required>
                                <option value="fluvial" <?php if ($porto["tipo"] == "fluvial") echo "selected='selected'";?> >Fluvial</option>
                                <option value="maritimo" <?php if ($porto["tipo"] == "maritimo") echo "selected='selected'";?> >Marítimo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Capacidade de Estocagem</label>
                            <input class="form-control" type="text" name="capacidade_estocagem" value="<?=$porto["capacidade_estocagem"]?>" placeholder="Capacidade em toneladas" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="action" value="alterarPorto" />
                            <input type="hidden" name="originalNome" value='<?=$porto["nome"]?>' />
                            <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include (FOOTER_TEMPLATE);?>
