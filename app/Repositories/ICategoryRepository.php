<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepository;
use App\Enums\Status;

class ICategoryRepository implements CategoryRepository
{
    public function getAll()
    {
        return Category::all();
    }

    public function getId($id)
    {
        return Category::find($id);
    }

    public function getWhere($query = [])
    {
        return Category::where($query);
    }
    public function getActive()
    {
        return Category::where('status', Status::Active)->get();
    }

}
