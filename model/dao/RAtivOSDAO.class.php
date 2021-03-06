<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('../dbutil/Conn.class.php');
/**
 * Description of MotoristaDAO
 *
 * @author anderson
 */
class RAtivOSDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT DISTINCT "
                            . " OS.ID_ATIV_OS AS \"idRAtivOS\" "
                            . " , OS.NRO_OS AS \"nroOS\" "
                            . " , OS.CD_FAZENDA AS \"codFazenda\" "
                            . " , CARACTER(OS.NOME_FAZENDA) AS \"descrFazenda\" "
                        . " FROM "
                            . " USINAS.V_INTEGRA_OS OS ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
    public function pesqInfo($os) {

        $select = " SELECT DISTINCT "
                . " OS.ID_ATIV_OS AS \"codigoAtivOS\" "
                . " , OS.NRO_OS AS \"nroOSAtivOS\" "
                . " , CARACTER(OS.NOME_FAZENDA) AS \"nomeAtivOS\" "
                . " FROM "
                . " USINAS.V_INTEGRA_OS OS "
                . " WHERE "
                . " OS.ID_ATIV_OS = " . $os;

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
