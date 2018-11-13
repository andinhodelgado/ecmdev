<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'ConnDEV.class.php';
/**
 * Description of MotoristaDAO
 *
 * @author anderson
 */
class NoteiroCanaDAO extends ConnDEV {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT "
                    . " MATRICULA AS \"codNoteiroCana\" "
                . " FROM "
                    . " USINAS.V_INTEGRA_NOTEIRO "
                . " ORDER BY "
                    . " MATRICULA "
                . " DESC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
