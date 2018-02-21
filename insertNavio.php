<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2>Adicionar Navio</h2>

<form name="dadosNavio" action="connection.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" style="width: 100%" value="" /></td>
            </tr>
            <tr>
                <td>Capacidade:</td>
                <td><input type="text" name="capacidade" style="width: 100%" value="" /></td>
            </tr>
            <tr>
                <td>Comprimento:</td>
                <td><input type="text" name="comprimento" style="width: 100%" value="" /></td>
            </tr>
            <tr>
                <td>Calado:</td>
                <td><input type="text" name="calado" style="width: 100%" value="" /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="action" value="inserirNavio" /></td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include (FOOTER_TEMPLATE);?>        
