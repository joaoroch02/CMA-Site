<?php
include ("ClassConexao.php");

class ClassVisitas extends ClassConexao{

private $Id , $Ip , $Data , $Hora , $Limite;


    public function __construct ()
    {
        $this->Id=0;
        $this->Ip=$_SERVER['REMOTE_ADDR'];
        $this->Data=date("Y/m/d");
        $this->Hora=date ("H:i");
        $this->Limite=50;
    } 

    public function VerificaUsuario ()
    {
        $select=$this->Conectar()->prepare("select * from visitas where Ip=:ip and Data=:datas order by Id:desc") ;
        $select->bindParam(":ip", $this->Ip, PDO:PARAM_STR) ;
        $select->bindParam(":datas", $this->Data, PDO: PARAM_STR) ;
        $select->execute();
        $select->execute() ;
        if ($select->rowCount () == 0) {
            $this->InserindoVisitas();
        }else{
            $FSelect=$Select->fetch (PDO: :FETCH_ASSOC);
            $HoraDB=strtotime($FSelect[]);
            $HoraAtual=strtotime($this->Hora);
            $HoraSubtracao=$HoraAtual-$HoraDB;
        
            if($HoraSubtracao > $this->Limite){
                $this->InserindoVisitas();
            }
        }
        echo "<h1>Visitantes no site: ". $Select->rowCount()."</h1>";
    }

        private function InserindoVisitas ()
    {
        $select=$this->Conectar()->prepare("insert into visitas values (:id , :ip , :datas , :hora) Ip=:ip and Data=:datas order by Id:desc") ;
        $select->BindParam(":id", $this->Id, PDO: PARAM_STR) ;
        $select->BindParam(":ip", $this->Ip, PDO: PARAM_STR) ;
        $select->BindParam(":datas", $this->Data, PDO: PARAM_STR) ;
        $select->BindParam(":hora", $this->Hora, PDO: PARAM_STR) ;
        $select->execute() ;
    }

}