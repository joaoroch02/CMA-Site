<?php

abstract class ClassConexao () 
{
    try {
            $Con=new PDO ("mysql:host=localhost;dbname=sistema", "root","");
            return $Con;
        }catch (PDOException $Erro){
            return $Erro->getMessege () ;
    }
}
