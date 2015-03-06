<?php

class Contact

{
    private $name;
    private $phone;
    private $home;

    function __construct($name, $phone, $home)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->home = $home;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setPhone()
    {
        $this->phone = (float) $new_phone;
    }

    function getHome()
    {
        return $this->phone;
    }

    function setHome()
    {
        $this->home = (string) $new_home;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }
}

?>
