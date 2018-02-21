<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<?php include 'connection.php';
    try {
       $grupo = selectAllPortos(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2>Adicionar Agente</h2>

<form name="dadosAgente" action="connection.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="" /></td>
            </tr>
            <tr>
                <td>Porto:</td>
                <td>
                    <select name="nome_porto">
                        <?php
                            if($grupo){
                                foreach ($grupo as $agente){ ?>
                                    <option value="<?=$agente["nome"]?>"><?=$agente["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="action" value="inserirAgente" /></td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>
