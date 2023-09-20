<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title','asc')->paginate(7);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$category = new Category();
        //$category->title = $request->input('title');
        //$category->slug = str_slug($request->input('title'));
        //$category->save();
        //Category::created($request->all());
        $data = $request->validate([
            'title' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $category = Category::create($data);
        $iconPhoto  = $request->file('icon');
        if ($iconPhoto) {
            $imageName = CloudinaryStorage::upload($iconPhoto->getRealPath(), $iconPhoto->getClientOriginalName(), 'culking-challenge/category');
            $category->icon = $imageName;
            $category->save();
        }
        /* if ($request->hasFile('icon')) {
            $coverPhoto = $request->file('icon');
            $imageName = time() . '_' . $coverPhoto->getClientOriginalName();
            $coverPhoto->move(public_path('images'), $imageName);
            $category->icon = $imageName;
            $category->save();
        } */

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        //$category->slug = str_slug($request->input('title'));
        $iconPhoto  = $request->file('icon');
        if ($iconPhoto) {
            CloudinaryStorage::delete($category->icon, 'culking-challenge/category');
            $imageName = CloudinaryStorage::upload($iconPhoto->getRealPath(), $iconPhoto->getClientOriginalName(), 'culking-challenge/category');
            $category->icon = $imageName;
        }
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        CloudinaryStorage::delete($category->icon, 'culking-challenge/category');
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
