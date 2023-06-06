<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::when(request()->has('keyword'),function($query){
            $keyword = request()->keyword;
            $query->where('title','like',"%".$keyword."%");
        })
        ->when(request()->has("title"),function($query){
            $sortType = request()->title ?? 'asc';
            $query->orderBy('title',$sortType);
        })
        ->latest('id')
        ->paginate(7)
        ->withQueryString();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('category.index')->with(['message' =>$category->title.'is successfully created ']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // return view('category.show',compact('category'));
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        
        $category->update([
            'title' => $request->title,
        ]);

        return redirect()->route('category.index')->with(['message' =>$category->title.'is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['message' => 'category deleted successfully']);
    }
}
