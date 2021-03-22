<?php
session_start();
mysqli_connect("localhost", "root", "", "groups")
or die (mysqli_error($mysqli));

$id = 0;
$update = '';
$nom = '';
$type = '';
$adressemail = '';
$siegesocial = '';
$idutil = $_POST['Identifiant'];

function nouvorga () {
  if(isset($_POST['save'])){
  $nom = $_POST['nom'];
  $type = $_POST['type'];
  $adressemail = $_POST['adressemail'];
  //$siegesocial = $_POST['siegesocial'];

  $mysqli->query("INSERT INTO organization(name, domain, aliases) VALUES ('$nom', '$type', '$adressemail')") or die($mysqli->error());
  }
}

function modiforga(){
  if(isset($_POST['update'])){
      $nom = $_POST['nom'];
    $mysqli->query("UPDATE organization SET name='$nom', domain='$type', aliases='$adressemail' WHERE nom='$nom'") or die ($mysqli->error());
  }
}
//function supprorga (){
  //if(isset($_GET['Delete']))
//}
  function nouvutil () {
    if(isset($_POST['Identifiant'])){
      $mdputil = $_POST['Mdp'];
      //$numtelephone = $_POST['Numtelephone'];
      $emailutil = $_POST['emailutil'];

      $mysqli->query("INSERT INTO organization(id, password, email) VALUES ('$idutil', '$mdputil', $emailutil)") or die($mysqli->error());
    }
  }
    function modifutil () {
      if(isset($_POST['update'])){
        $idutil = $_POST['Identifiant'];
        $mdputil = $_POST['Mdp'];
        $mysqli->query("UPDATE organization SET id='$idutil', password='$mdputil', email='$emailutil' WHERE id='$idutil' AND password='$mdputil'") or die($mysqli->error());
      }
    }
    function supprutil () {
      if(isset($_GET['Delete'])){
        $idutil = $_GET['Delete'];
      }
      $mysqli->query("DELETE FROM organization WHERE id='$idutil'") or die ($mysqli->error());
    }
    if(isset($_POST['update'])){
      modifutil();
    }
    if(isset($_POST['Enregistrer'])){
      nouvutil();
    }
