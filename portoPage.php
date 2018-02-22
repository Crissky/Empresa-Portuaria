<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllPortos(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1 class="mb-4">Portos</h1> 
    <p id="addlink">
        <a class="btn btn-primary" href="insertPorto.php">Adicionar Porto</a>
    </p>
    <div class="container mt-5">
            <div class="row mb-5">
                
                <?php
                if($grupo){
                    foreach ($grupo as $porto){?>
                <div class="col-sm-4 mt-4">
                    <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Nome:</div>                                         
                                    <div class="d-inline"> <?=$porto["nome"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Endereço:</div>                                         
                                    <div class="d-inline"> <?=$porto["endereco"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Tipo:</div>                                         
                                    <div class="d-inline"> <?php if($porto["tipo"] == "fluvial"){echo 'Fluvial';} else {echo 'Marítimo';}?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Cap. Estocagem (Ton):</div>                                         
                                    <div class="d-inline"> <?=$porto["capacidade_estocagem"]?> </div>
                                </li>
                            </ul>
                        <div class="card-body ml-auto">
                            <div class="row">
                                <form class="mr-3" name="alterar" action="updatePorto.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$porto["nome"]?>'/>
                                    <input class="btn btn-warning" type="submit" value="Editar" name="editar" />
                                </form>
                                <form class="mr-3" name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$porto["nome"]?>' />
                                    <input type="hidden" name="action" value="excluirPorto" />
                                    <input class="btn btn-danger" type="submit" value="Excluir" name="excluir" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                }
                ?>
            </div>
        </div>
<?php include (FOOTER_TEMPLATE);?>
