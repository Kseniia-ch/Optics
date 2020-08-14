<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories  
        ];
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newcategory = new Category; 
        $newcategory->name = $request->name;
        $newcategory->save(); //save model into DB table

        // redirect
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (isset($category))
        {
            return redirect(url("goods")."?category_id=".$category->id);
        }
        else{
            return redirect('categories');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (isset($category))
        {
            $data = [
                'category' => $category
            ];
            return view('categories.edit', $data);
        }
        else{
            return redirect('categories');
        }
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
        $categoryToUpdate = Category::find($id);
        $categoryToUpdate->name = $request->name;
        $categoryToUpdate->save(); //save model into DB table
  
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryToDelete = Category::find($id);

        if($categoryToDelete->goods->count() == 0)
        {
            $categoryToDelete->delete();
        }

        return back()->withInput();
    }
}
