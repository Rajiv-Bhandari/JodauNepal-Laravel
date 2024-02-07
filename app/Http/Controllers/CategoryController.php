<?php

namespace App\Http\Controllers;

use App\Enums\Message;
use App\Enums\UserType;
use App\Functions\JodauNepal;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Interfaces\CategoryService;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService,CategoryRepository $categoryRepository)
    {

        $this->categoryService = $categoryService;
        // $this->categoryRepository = $categoryRepository;
        $this->jodauNepal = new JodauNepal();
    }

    public function index(Request $request)
    {
        try {
            $category=$this->categoryService->all();
            return view('admin.category.index',compact('category'));
        } catch (Exception $e) {
        }
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit($id)
    {
        try {
            $category = $this->categoryService->edit($id);
            return view('admin.category.edit', compact('category'));
        } catch (Exception $e) {
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = new Category();
            
            $category = $this->jodauNepal->getObject($category, $request);
            $this->categoryService->add($category, $request);
            Alert::toast('Category added successfully', 'success');

            return redirect()->intended(route('category.index'));
        } catch (Exception $e) {
            Log::error('Error while storing Category: ' . $e->getMessage());
            Alert::toast('Error while creating Category', 'error');
            return redirect()->intended(route('category.create'));
        }
    }


    public function toggle($id)
    {
        try {
            $this->categoryService->toggle($id);
            $this->jodauNepal->message('Category Status Updated', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception(Message::Failed);
        }
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        try {
            $category = new Category();
             $category = $this->jodauNepal->getObject($category, $request);
            $category = $this->categoryService->update($category, $id, $request);
             $this->jodauNepal->message('Category Updated Successfully', 'success');
            return redirect()->intended(route('category.index'));
        } catch (Exception $e) {
            $this->jodauNepal->message('oops! something went wrong', 'error');
            return back();
        }
    }
}
