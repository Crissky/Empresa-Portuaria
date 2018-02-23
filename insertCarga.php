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
    <table border="1">
        <tbody>
            <tr>
                <td>Peso:</td>
                <td><input type="text" name="peso" style="width: 100%" value="" required /></td>
            </tr>
            <tr>
                <td>Código Agente:</td>
                <td>
                    <select name="codigo" style="width: 100%" required>
                        <?php
                            if($grupo_agente){
                                foreach ($grupo_agente as $agente){ ?>
                                    <option value="<?=$agente["codigo"]?>"><?=$agente["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td id="radio">
                    <input type="radio" name="tipo" value="perecivel" onclick="javascript:habilita_perecivel();" checked="checked"/>
                    <label>Perecível</label><br>
                    <input type="radio" name="tipo" value="sensivel" onclick="javascript:desabilita_perecivel();"/>
                    <label>Sensível</label>
                    <!--<select name="tipo" style="width: 100%">
                        <option value="perecivel">Perecível</option>
                        <option value="sensivel">Sensível</option>
                    </select>-->
                </td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="date" name="data_validade" style="width: 100%" id="linked_perecivel" value="<?php echo date('Y-m-d'); ?>" required /></td>
            </tr>
            <tr>
                <td>Temperatura Máx:</td>
                <td><input type="text" name="temperatura_maxima" style="width: 100%" id="linked_sensivel" value="" disabled="disabled" required/></td>
            </tr>
            <tr>
                <td>Navio:</td>
                <td>
                    <select name="nome_navio" style="width: 100%" required>
                        <?php
                            if($grupo_navio){
                                foreach ($grupo_navio as $navio){ ?>
                                    <option value="<?=$navio["nome"]?>"><?=$navio["nome"]?></option>
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
                                    <option value="<?=$porto["nome"]?>"><?=$porto["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Desembarque:</td>
                <td><input type="date" name="data_maxima_desembarque" style="width: 100%" value="<?php echo date('Y-m-d'); ?>"  /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="action" value="inserirCarga" /></td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include (FOOTER_TEMPLATE);?>
