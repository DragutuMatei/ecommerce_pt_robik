<?php
class Cos
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public static function AddProduse($id)
    {
        if (!isset($_SESSION['produse'][$_SESSION['user']])) {
            $_SESSION['produse'][$_SESSION['user']] = [];
        }

        $_SESSION['produse'][$_SESSION['user']][$id] = $id;

        if (!isset($_SESSION['qty'][$_SESSION['user']][$id])) {
            $_SESSION['qty'][$_SESSION['user']][$id] = 1;
        } else {
            $_SESSION['qty'][$_SESSION['user']][$id]++;
        }
        return true;
    }

    public static function Exists()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['produse'][$_SESSION['user']])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function GetProduse()
    {
        return $_SESSION['produse'][$_SESSION['user']];
    }

    public function GetItem($params = array())
    {
        if ($this->_db->get("flori", $params) == [])
            throw new Exception("nu mai e");
        return $this->_db->getFirst();
    }

    public static function DeleteProdus($id)
    {
        foreach ($_SESSION['produse'][$_SESSION['user']] as $produs) {
            if ($produs == $id) {
                unset($_SESSION['produse'][$_SESSION['user']][$id]);
                unset($_SESSION['qty'][$_SESSION['user']][$id]);
            }
        }
        return true;
    }

    public static function DeleteAll()
    {
        Session::delete("produse");
        Session::delete("qty");
    }
}
