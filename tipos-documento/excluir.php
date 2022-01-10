<?php
require '../vendor/autoload.php';

use \App\Entity\TipoDocumento;

include '../includes/header.php';

define('TITLE','Editar Documento');


//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }
  
  //CONSULTA A TIPO
  $obTipoDocumento = TipoDocumento::getTipoDocumento($_GET['id']);

  //VALIDAÇÃO DA TIPO
if(!$obTipoDocumento instanceof TipoDocumento){
    header('location: index.php?status=error');
    exit;
  }


//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obTipoDocumento->excluir();
  
    header('location: index.php?status=success');
    exit;
}


include __DIR__.'/confirmar-exclusao.php';
