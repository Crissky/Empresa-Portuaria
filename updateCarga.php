<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<?php include 'connection.php';
       date_default_timezone_set('America/Sao_Paulo');
    try {
       $grupo_navio = selectAllNavios();
       $grupo_porto = selectAllPortos();
       $grupo_agente = selectAllAgentes();
       $grupo_tipo = selectAllTiposCargas();
       $carga = selectCargasByNumero($_POST["numero"]);
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
//    var_dump($carga);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<script type="text/javascript">
    function habilita_perecivel(){
        document.getElementById("linked_perecivel").disabled = false;
        document.getElementById("linked_sensivel").disabled = true;
    }
function desabilita_perecivel(){
        document.getElementById("linked_perecivel").disabled = true;
        document.getElementById("linked_sensivel").disabled = false;
    }
</script>

<h2>Editar Carga</h2>

<form name="dadosCarga" action="connection.php" method="POST" >
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md10 col-lg-8">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Peso</label>
                            <input class="form-control" type="text" name="peso" value="<?=$carga["peso"]?>" placeholder="Peso em toneladas" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Agente</label>
                            <select class="form-control" name="codigo">
                                <?php
                                    if($grupo_agente){
                                        foreach ($grupo_agente as $agente){ ?>
                                            <option value="<?=$agente["codigo"]?>"  <?php if ($agente["codigo"] == $carga["codigo"]) echo "selected='selected'";?> ><?=$agente["nome"]?></option>
                                    <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Tipo</label>
                            <div class="row">
                                <div class="col-sm-12 col-md10 col-lg-8">
                                    <input class="form-check-inline" id="tipoper" type="radio" name="tipo" value="perecivel" onclick="javascript:habilita_perecivel();" <?php if($carga["tipo"] == "perecivel") echo 'checked="checked"';?> required/>
                                    <label for="tipoper">Perecível</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md10 col-lg-8">
                                    <input class="form-check-inline" id="tiposen" type="radio" name="tipo" value="sensivel" onclick="javascript:desabilita_perecivel();" <?php if($carga["tipo"] == "sensivel") echo 'checked="checked"';?> required/>
                                    <label for="tiposen">Sensível</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Validade</label>
                            <input class="form-control" type="date" name="data_validade" id="linked_perecivel" <?php if($carga["tipo"] == "sensivel") echo 'disabled="disabled"';?> <?php if($carga["tipo"] == "perecivel") echo 'value="'.$carga["data_validade"].'"';?> required/></td>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Temperatura Máxima</label>
                            <input class="form-control" type="text" name="temperatura_maxima" id="linked_sensivel" <?php if($carga["tipo"] == "perecivel") echo 'disabled="disabled"';?> <?php if($carga["tipo"] == "sensivel") echo 'value="'.$carga["temperatura_maxima"].'"';?> placeholder="Temperatura em ºC" required/></td>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Navio</label>
                            <select class="form-control" name="nome_navio" required>
                                <?php
                                    if($grupo_navio){
                                        foreach ($grupo_navio as $navio){ ?>
                                            <option value="<?=$navio["nome"]?>" <?php if ($carga["nome_navio"] == $navio["nome"]) echo "selected='selected'";?> ><?=$navio["nome"]?></option>
                                    <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Porto</label>
                            <select class="form-control" name="nome_porto" required>
                                <?php
                                    if($grupo_porto){
                                        foreach ($grupo_porto as $porto){ ?>
                                            <option value="<?=$porto["nome"]?>" <?php if ($carga["nome_porto"] == $porto["nome"]) echo "selected='selected'";?> ><?=$porto["nome"]?></option>
                                    <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Desembarque</label>
                            <input class="form-control" type="date" name="data_maxima_desembarque" value="<?=$carga['data_maxima_desembarque']?>" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="action" value="alterarCarga" />
                            <input type="hidden" name="numero" value='<?=$carga["numero"]?>' />
                            <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include (FOOTER_TEMPLATE);?>
