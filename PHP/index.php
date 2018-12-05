<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="../JS/fonctions.js"></script>
    </head>
    <body>

    <table border="1" cellpadding="15">
   <tr>
      <th>Numero de Commande</th>
      <th>Choix du livreur</th>
      <th>Choix du client</th>
   </tr>
   <tr>
   <td>
        <?php
              
            include 'cnx.php';

            $sql = $bdd->prepare("select numCli, numCde from commandes ");
            $sql->execute();
            echo "<label>Selection Commandes</label><br>";
            echo "<select id=numcommande onchange='AfficherLesCommandes()'>";
            foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
            {
                echo "<option value='".$ligne['numCli']."'>".$ligne['numCde']."</option>";
            }            
            echo "</select><td>";

            $sql = $bdd->prepare("select nomLiv from livreurs ");
            $sql->execute();
            echo "<label>Selection Livreurs</label><br>";
            echo "<select id=nomliv onchange='AfficherLeslivreurs()'>";
            foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
            {
                echo "<option value='".$ligne['numLiv']."'>".$ligne['nomLiv']."</option>";
            }            
            echo "</select><td>";

            $sql = $bdd->prepare("select nomCli from clients ");
            $sql->execute();
            echo "<label>Selection Clients</label><br>";
            echo "<select id=nomcli onchange='AfficherLesClients()'>";
            foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
            {
                echo "<option value='".$ligne['numCli']."'>".$ligne['nomCli']."</option>";
            }
            echo "</select>";

        ?>
    </table>
    <table border="1" cellpadding="15" width="100%">
   <tr>
      <th>Choix de la Pizza
    </table>

    <table border="1" cellpadding="15">
   <tr>
      <th>Nom de la Pizza</th>
      <th>Nombre de Personnes</th>
      <th>Prix</th>
      <th>Quantite</th>
   </tr>
   <tr>
   <td>
        <?php

        include 'cnx.php';

        $sql = $bdd->prepare("select numPiz, nomPiz from pizzas ");
        $sql->execute();
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
        {
            echo "<option value='".$ligne['numPiz']."'>".$ligne['nomPiz']."</option>";
        }            
        echo "</select><td>";

        $sql = $bdd->prepare("select numPiz, nbPers from pizzas ");
        $sql->execute();
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
        {
            echo "<option value='".$ligne['numPiz']."'>".$ligne['nbPers']."</option>";
        }            
        echo "</select><td>";

        $sql = $bdd->prepare("select numPiz, prix from pizzas ");
        $sql->execute();
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
        {
            echo "<option value='".$ligne['numPiz']."'>".$ligne['prix']."</option>";
        }            
        echo "</select><td>";

        ?>
        <div> 
        <input type="range" min="0" max="10" value="0" oninput="document.getElementById('AfficheRange').textContent=value" />
<span id="AfficheRange">0</span>
    </body>
</html>