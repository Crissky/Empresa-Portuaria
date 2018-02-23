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
    <table border="1">
        <tbody>
            <tr>
                <td>Peso:</td>
                <td><input type="text" name="peso" style="width: 100%" value='<?=$carga["peso"]?>' required/></td>
            </tr>
            <tr>
                <td>Código Agente:</td>
                <td>
                    <select name="codigo" style="width: 100%">
                        <?php
                            if($grupo_agente){
                                foreach ($grupo_agente as $agente){ ?>
                                    <option value="<?=$agente["codigo"]?>"  <?php if ($agente["codigo"] == $carga["codigo"]) echo "selected='selected'";?> ><?=$agente["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td id="radio">
                    <input type="radio" name="tipo" value="perecivel" onclick="javascript:habilita_perecivel();" <?php if($carga["tipo"] == "perecivel") echo 'checked="checked"';?> required/>
                    <label>Perecível</label><br>
                    <input type="radio" name="tipo" value="sensivel" onclick="javascript:desabilita_perecivel();" <?php if($carga["tipo"] == "sensivel") echo 'checked="checked"';?> required/>
                    <label>Sensível</label>
                </td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="date" name="data_validade" style="width: 100%" id="linked_perecivel" <?php if($carga["tipo"] == "sensivel") echo 'disabled="disabled"';?> <?php if($carga["tipo"] == "perecivel") echo 'value="'.$carga["data_validade"].'"';?> required/></td>
            </tr>
            <tr>
                <td>Temperatura Máx:</td>
                <td><input type="text" name="temperatura_maxima" style="width: 100%" id="linked_sensivel" <?php if($carga["tipo"] == "perecivel") echo 'disabled="disabled"';?> <?php if($carga["tipo"] == "sensivel") echo 'value="'.$carga["temperatura_maxima"].'"';?> required/></td>
            </tr>
            <tr>
                <td>Navio:</td>
                <td>
                    <select name="nome_navio" style="width: 100%" required>
                        <?php
                            if($grupo_navio){
                                foreach ($grupo_navio as $navio){ ?>
                                    <option value="<?=$navio["nome"]?>" <?php if ($carga["nome_navio"] == $navio["nome"]) echo "selected='selected'";?> ><?=$navio["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Porto:</td>
                <td>
                    <select name="nome_porto" style="width: 100%" required>
                        <?php
                            if($grupo_porto){
                                foreach ($grupo_porto as $porto){ ?>
                                    <option value="<?=$porto["nome"]?>" <?php if ($carga["nome_porto"] == $porto["nome"]) echo "selected='selected'";?> ><?=$porto["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Desembarque:</td>
                <td><input type="date" name="data_maxima_desembarque" style="width: 100%" value="<?=$carga['data_maxima_desembarque']?>" required/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="action" value="alterarCarga" /></td>
                <input type="hidden" name="numero" value='<?=$carga["numero"]?>' />
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include (FOOTER_TEMPLATE);?>
