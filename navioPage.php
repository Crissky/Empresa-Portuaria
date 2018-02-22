<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllNavios(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h1 class="mb-4">Navios</h1>

    <p id="addlink">
        <a class="btn btn-primary" href="insertNavio.php">Adicionar Navio</a>
    </p>

    <div class="container mt-5">
            <div class="row mb-5">
                
                <?php
                if($grupo){
                    foreach ($grupo as $navio){?>
                <div class="col-sm-4 mt-4">
                    <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Nome:</div>                                         
                                    <div class="d-inline"> <?=$navio["nome"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Capacidade (Ton):</div>                                         
                                    <div class="d-inline"> <?=$navio["capacidade"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Comprimento (m):</div>                                         
                                    <div class="d-inline"> <?=$navio["comprimento"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Calado:</div>                                         
                                    <div class="d-inline"> <?=$navio["calado"]?> </div>
                                </li>
                            </ul>
                        <div class="card-body ml-auto">
                            <div class="row">
                                <form class="mr-3 mt-1" name="alterar" action="updateNavio.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$navio["nome"]?>'/>
                                    <input class="btn btn-warning" type="submit" value="Editar" name="editar" />
                                </form>
                                <form class="mr-3 mt-1" name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$navio["nome"]?>' />
                                    <input type="hidden" name="action" value="excluirNavio" />
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