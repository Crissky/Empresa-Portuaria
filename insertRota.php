<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<?php include 'connection.php';
    try {
       $grupo_navio = selectAllNavios();
       $grupo_porto = selectAllPortos();
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2 class="mt-5 pt-5">Adicionar Rota</h2>

<form name="dadosRota" action="connection.php" method="POST">    
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md10 col-lg-8">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Navio</label>
                            <select class="form-control" name="nome_navio" style="width: 100%" required>
                                <?php
                                    if($grupo_navio){
                                        foreach ($grupo_navio as $navio){ ?>
                                            <option value="<?=$navio["nome"]?>"><?=$navio["nome"]?></option>
                                    <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Porto</label>
                            <select class="form-control" name="nome_porto" style="width: 100%">
                                <?php
                                    if($grupo_porto){
                                        foreach ($grupo_porto as $porto){ ?>
                                            <option value="<?=$porto["nome"]?>"><?=$porto["nome"]?></option>
                                    <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="action" value="inserirRota" />
                            <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include (FOOTER_TEMPLATE);?>
