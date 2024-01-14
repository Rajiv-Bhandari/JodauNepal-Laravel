<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Enums\Status;
use App\Enums\Message;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;
use App\Services\Interfaces\CategoryService;
use App\Repositories\Interfaces\CategoryRepository;

class ICategoryService implements CategoryService
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        try {
            DB::beginTransaction();
            return $this->categoryRepository->getAll();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(Message::Failed);
        }
    }

    public function getId($id)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->getWhere([['user_id', $id]])->get();
            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(Message::Failed);
        }
    }

    public function add(Category $category,CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            // $category->name = $request->name;
            $category->save();
            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(Message::Failed);
        }
    }

    public function update(Category  $data, $id)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->getId($id);
            $category->name = $data->name;   
            $category->save();
            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(Message::Failed);
        }
    }
    public function edit($id)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->getWhere([['id', $id]])->first();
            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception(Message::Failed);
        }
    }
    
    public function toggle($id)
    {
        try {
            
            DB::beginTransaction();
           
            $category = $this->categoryRepository->getId($id);
           
            if ($category == null) {
                throw new Exception(Message::NOT_FOUND);
            }
           
            if ($category->status == Status::Active) {
                $category->status = Status::Inactive;
            } else {
                $category->status = Status::Active;
            }
         
            $category->save();
            DB::commit();

            return $category;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception(Message::Failed);
        }
    }
}
