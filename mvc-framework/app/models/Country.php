<?php

/**
 * Dit is de model voor de controller Countreis
 */

class Country
{
    //properties
    private $db;
    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }
}
