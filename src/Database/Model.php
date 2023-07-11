<?php

namespace Petite\Database;

use Inventario\App;

abstract class Model
{

    protected $db;

    public function __construct()
    {
        $this->db = App::db();
    }
}
