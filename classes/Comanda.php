<?php

class Comanda
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    private function deleteProduseFromDb($numeP, $nrQ, $t)
    {
        for ($i = 0; $i < $t; $i++) {
            $item = $numeP[$i];
            $qt = intval($nrQ[$i]);
            
            $itemDB = $this->_db->get("flori", array("nume", "=", $item));
            $itemDB = $itemDB->first();
            $itemQT = intval($itemDB->cantitate);
            $newQT = $itemQT - $qt;

            if(!$this->_db->update("flori", $itemDB->id, array("cantitate"=>$newQT))){
                throw new Exception("Nu le da jos");
            }

        }
    }

    public function addComanda($field = array(), $numeP, $nrQ, $t)
    {
        $this->deleteProduseFromDb($numeP, $nrQ, $t);
        if (!$this->_db->insert("comenzi", $field)) {
            throw new Exception("Nu vr el sa mearga");
        }
    }

    public function deleteComanda($id)
    {
        if (!$this->_db->delete("comenzi", array("id", "=", $id))) {
            throw new Exception("nu mai vr el");
        }
    }

    public function getComenzi()
    {
        $comenzi = $this->_db->get("comenzi", array("id", ">=", "0"));
        return $comenzi->results();
    }
}
