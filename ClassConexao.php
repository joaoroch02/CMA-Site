<?php

//abstract 
class ClassConexao {

    public function conectar (){
        try {
                $Con=new PDO ("mysql:host=localhost;dbname=visitas", "root","");
                return $Con;
            }catch (PDOException $Erro){
                return $Erro->getMessage () ;
        }
    }
}
