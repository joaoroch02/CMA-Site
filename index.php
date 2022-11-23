<?php


include ("ClassConexao.php");
$Conexao=new ClassConexao();
$Teste=$Conexao->Conectar();
var_dump($Teste);

//include("ClassVisitas.php");
//$visitas=new ClassVisitas();
//$visitas=InserindoVisitas();
//$visitas=VerificaUsuario();