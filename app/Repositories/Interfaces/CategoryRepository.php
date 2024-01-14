<?php

namespace App\Repositories\Interfaces;

interface CategoryRepository
{
    public function getAll();
    public function getId($id);
    public function getWhere($query = []);
    public function getActive();
    
}
