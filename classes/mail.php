<?php

class Mail
{
    private $_db, $_rez;


    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function getEmail()
    {
        $this->_rez = $this->_db->get("mail", array("id", ">=", "1"), " ORDER BY id DESC");
        return $this->_rez->results();
    }

    public function sendEmail($items = array())
    {
        if (!$this->_db->insert("mail", $items)) {
            throw new Exception("amin");
        }
    }


    
    public function deleteEmail($id)
    {
        if (!$this->_db->delete("mail", array("id", "=", $id))) {
            throw new Exception("amin");
        }
    }
}
