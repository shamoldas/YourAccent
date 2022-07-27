<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::latest()->paginate(10);            
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $request->validate([
            'title' => 'required',
            'description' => 'required'
                ]);

            //$input = $request->all();

                $category = new Category;

                $category->user_id = $request->get('user_id');
                $category->title = $request->get('title');
                $category->description = $request->get('description');

                $category->save();
        return redirect()->route('category')
                        ->with('success','Category Create Successfully');
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
    public function edit($id)
    {
        //
           $category = Category::find($id);
            return view('category.edit', compact('category'));
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
        //
           $request->validate([
            'title' => 'required',
            'description' => 'required'
                ]);
                 
                $category = new Category;

                //$category->user_id = $request->get('user_id');
                $category->title = $request->get('title');
                $category->description = $request->get('description');

                $category->save()  ; 
                return redirect()->route('category')
                        ->with('success','Category Updated Successfully');
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

     $category->delete();            
            return redirect()->route('category')->with('success',' Deleted successfully');
    }

    public function searchCategory(Request $request)
    {

    //$posts = Post::latest()->paginate(10);
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $categorys = Category::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orWhere('created_at', 'like', "%'$search'%")
         ->orderBy('id', 'desc')
        ->get();

    // Return the search view with the resluts compacted
    return view('category.searchCategory', compact('categorys'));
    }

    public function showCategory()
    {
        //
         $category = Category::all();
        $category = Category::latest()->paginate(10);            
        return view('category.show', compact('category'));
    }
}
