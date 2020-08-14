<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
use App\Good;
use App\Category;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_fil = "";
        if( isset($request['category_id'])){
            $category_fil = $request['category_id'];
        }

        $categories = Category::all();
        $goods = Good::filter($request->all())->get();

        $good_id = 0;
        $data = [
            'category_fil' => $category_fil,
            'categories' => $categories,
            'goods' => $goods,
            'good_id' => $good_id        
        ];
        return view('goods.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories      
        ];
        return view('goods.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newgood = new Good; 
        $newgood->name = $request->name;
        $newgood->category_id = $request->category_id;
        $newgood->price = $request->price;
        $newgood->description = $request->description;
        $newgood->save(); //save model into DB table

        if($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $newfilename = ''.$newgood->id.'-'.time().'.'.$file->extension();
            $path = $file->move("storage/goodimg", $newfilename);

            $newgood->image_path = $newfilename;
            $newgood->save();
        }     

        // redirect
        return redirect('goods');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $good = Good::find($id);
        if (isset($good))
        {
            $data = [
                'good' => $good
            ];
            return view('goods.show', $data);
        }
        else{
            return redirect('goods');
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
        $good = Good::find($id);
        if (isset($good))
        {
            $categories = Category::all();
            $data = [
                'categories' => $categories, 
                'good' => $good
            ];
            return view('goods.edit', $data);
        }
        else{
            return redirect('goods');
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
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
  
        $goodToUpdate = Good::find($id);
        $goodToUpdate->name = $request->name;
        $goodToUpdate->category_id = $request->category_id;
        $goodToUpdate->price = $request->price;
        $goodToUpdate->description = $request->description;
        $goodToUpdate->save(); //save model into DB table

        if($request->hasFile('image_path')) {

            $preImage = $goodToUpdate->image_path;

            $file = $request->file('image_path');
            $newfilename = ''.$goodToUpdate->id.'-'.time().'.'.$file->extension();
            $path = $file->move("storage/goodimg", $newfilename);

            $goodToUpdate->image_path = $newfilename;
            $goodToUpdate->save();

            Storage::delete('public/goodimg/'.$preImage);
        }     
  
        return redirect('goods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goodToDelete = Good::find($id);

        Storage::delete('public/goodimg/'.$goodToDelete->image_path);

        $goodToDelete->delete();

        return back()->withInput();
    }
}
