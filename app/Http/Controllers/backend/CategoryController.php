<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // fetching all categories with sub categories
        $categories = Category::AllCategories()->get();


        // only parent categories via subcategory relationship
        $parentCategories = Category::Tree()->simplePaginate(15);




        return view('backend.category.create', compact('categories', 'parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation process
        $request->validate([
            'name' => 'required|max:50|unique:categories,name',

        ], [
            'name.unique' => 'This Category has already been created!'
        ]);



        // end of validation

        // storing data into database
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_category;
        $category->save();
        return back()->with('success', 'New Category has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $selectedCategory = Category::select('id', 'name', 'parent_id')->where('id', $request->itemId)->tobase()->first();

        $parent_name = Category::where('id', $selectedCategory->parent_id)->select('name')->first();
        return [$selectedCategory, $parent_name];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::with('subcategories')->find($id);
        $category->name = $request->name;

        // validataion

        if ($request->parent_id == $id) {
            return back()->withErrors(['name' => 'Something went wrong!']);
        } else if ($request->parent_id) {


            if ($category->subcategories->count() > 0) {
                return back()->withErrors(['name' => 'Something went wrong!']);
            } else {
                $category->parent_id = $request->parent_id;
            }
        } else {
            $category->parent_id = null;
        }

        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('haha');
        $category = Category::with(['subcategories' => function ($query) {
            $query->delete();
        }])->find($id)->delete();

        return back();
    }
}
