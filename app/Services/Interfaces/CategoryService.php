<?php

namespace App\Services\Interfaces;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;


interface CategoryService
{
    public function all();
    public function getId($id);
    public function add(Category $category,CategoryRequest $request);
    public function edit($id);
    public function update(Category $request, $id);
    public function toggle($id);
}
