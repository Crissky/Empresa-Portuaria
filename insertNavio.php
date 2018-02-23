<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script language="Javascript">
function validateForm() {
   var nome = document.forms["dadosNavio"]["nome"].value;
   var capacidade = document.forms["dadosNavio"]["capacidade"].value;
   var comprimento = document.forms["dadosNavio"]["comprimento"].value;
   var calado = document.forms["dadosNavio"]["calado"].value;
   var verificacao = true;
   if ( nome == null || nome == "" ) {
      alert("Todos os campos são obrigatorios");
      return false;
   }
   if ( capacidade == null || capacidade == "" ) {
      alert("Todos os campos são obrigatorios");
      return false;
   }
   if ( comprimento == null || comprimento == "" ) {
      alert("Todos os campos são obrigatorios");
      return false;
   }
   if ( calado == null || calado == "" ) {
      alert("Todos os campos são obrigatorios");
      return false;
   }
}
</script>
<h2>Adicionar Navio</h2>

<form name="dadosNavio" action="connection.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" ng-module="navio.nome" style="width: 100%" value="" required /></td>

            </tr>
            <tr>
                <td>Capacidade:</td>
                <td><input type="text" name="capacidade" style="width: 100%" value="" required/></td>
            </tr>
            <tr>
                <td>Comprimento:</td>
                <td><input type="text" name="comprimento" style="width: 100%" value="" required/></td>
            </tr>
            <tr>
                <td>Calado:</td>
                <td><input type="text" name="calado" style="width: 100%" value="" required/></td>
            </tr>

            <tr>
              <td><input type="hidden" name="action" value="inserirNavio" ng-disable="!navio.nome" /></td>
              <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include (FOOTER_TEMPLATE);?>
