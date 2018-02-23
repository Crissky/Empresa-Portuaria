<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllCargas(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php
    function formataData($data){
        $array = explode("-", $data);
        $novaData = $array[2]."/".$array[1]."/".$array[0];

        return $novaData;
    }
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1 class="mb-4 display-4">Cargas</h1>

    <p id="addlink">
        <a class="btn btn-primary" href="insertCarga.php">Adicionar Carga</a>
    </p>

    <div class="container mt-5">
            <div class="row mb-5 justify-content-center">
                
                <?php
                if($grupo){
                    foreach ($grupo as $carga){ ?>
                <div class="col-sm-11 col-md-6 col-lg-4 mt-4">
                    <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Número:</div>                                         
                                    <div class="d-inline"> <?=$carga["numero"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Peso (Ton):</div>                                         
                                    <div class="d-inline"> <?=$carga["peso"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Código:</div>                                         
                                    <div class="d-inline"> <?=$carga["codigo"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Tipo:</div>                                         
                                    <div class="d-inline"> <?php if($carga["tipo"] == "perecivel"){echo 'Perecível';} else {echo 'Sensível';}?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Validade:</div>                                         
                                    <div class="d-inline"> <?php if($carga["data_validade"]){echo formataData($carga["data_validade"]);} else {echo 'N/A';}?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Temperatura:</div>                                         
                                    <div class="d-inline"> <?php if($carga["temperatura_maxima"]){echo $carga["temperatura_maxima"]."C";} else {echo 'N/A';}?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Navio:</div>                                         
                                    <div class="d-inline"> <?=$carga["nome_navio"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Porto:</div>                                         
                                    <div class="d-inline"> <?=$carga["nome_porto"]?> </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-inline font-weight-bold">Desembarque:</div>                                         
                                    <div class="d-inline"> <?php if($carga["data_maxima_desembarque"]){echo formataData($carga["data_maxima_desembarque"]);} else {echo 'N/A';}?> </div>
                                </li>
                            </ul>
                        <div class="card-body ml-auto">
                            <div class="row">
                                <form class="mr-3 mt-1" name="alterar" action="updateCarga.php" method="POST">
                                    <input type="hidden" name="numero" value='<?=$carga["numero"]?>'/>
                                    <input class="btn btn-warning" type="submit" value="Editar" name="editar" />
                                </form>
                                <form class="mr-3 mt-1" name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="numero" value='<?=$carga["numero"]?>' />
                                    <input type="hidden" name="action" value="excluirCarga" />
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