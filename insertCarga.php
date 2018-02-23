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
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
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

<h2>Adicionar Carga</h2>

<form name="dadosCarga" action="connection.php" method="POST" >
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md10 col-lg-8">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Peso</label>
                            <input class="form-control" type="text" name="peso" value="" placeholder="Peso em toneladas" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Agente</label>
                            <select class="form-control" name="codigo" required>
                                <?php
                                    if($grupo_agente){
                                        foreach ($grupo_agente as $agente){ ?>
                                            <option value="<?=$agente["codigo"]?>"><?=$agente["nome"]?></option>
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
                                    <input class="form-check-inline" id="tipoper" type="radio" name="tipo" value="perecivel" onclick="javascript:habilita_perecivel();" checked="checked"/>
                                    <label for="tipoper">Perecível</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md10 col-lg-8">
                                    <input class="form-check-inline" id="tiposen" type="radio" name="tipo" value="sensivel" onclick="javascript:desabilita_perecivel();"/>
                                    <label for="tiposen">Sensível</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Validade</label>
                            <input class="form-control" type="date" name="data_validade" id="linked_perecivel" value='<?php echo date("Y-m-d"); ?>' required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Temperatura Máxima</label>
                            <input class="form-control" type="text" name="temperatura_maxima" id="linked_sensivel" value="" placeholder="Temperatura em ºC" disabled="disabled" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Navio</label>
                            <select class="form-control" name="nome_navio" required>
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
                            <select class="form-control" name="nome_porto" required>
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
                            <label for="inputNome">Desembarque</label>
                            <input class="form-control" type="date" name="data_maxima_desembarque" value="<?php echo date('Y-m-d'); ?>" required/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="action" value="inserirCarga" />
                            <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include (FOOTER_TEMPLATE);?>
