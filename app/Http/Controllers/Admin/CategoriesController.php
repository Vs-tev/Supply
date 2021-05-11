<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified', 'is_admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $categories = Category::with('product')
        ->orderBy('name', $request->search == null ? 'asc' : $request->search)
        ->get();

        return Inertia::render('Admin/Categories', ['categories' => $categories]);
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return Redirect::back();
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->where('id', $request->id)->update($request->validated());

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
