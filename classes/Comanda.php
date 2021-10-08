<?php

class Comanda
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function addComanda($field = array())
    {
        if (!$this->_db->insert("comenzi", $field)) {
            throw new Exception("nu vr el sa mearga");
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
