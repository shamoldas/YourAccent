<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
//use App\Models\Comment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //
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

         $user = User::find($id);
          return view('admin.userEdit', compact('user'));
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

          
                $user = User::find($id);
                
                $user->type = $request->get('type');
                //$post->body = $request->get('body');
                $user->save();
    
                return redirect()->route('userList')
                        ->with('success','Post Updated successfully');
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



     public function userList()
    {
        return view('admin.userList');
    }
    public function ShowUserlist(){


        $users = User::all();

        return view('admin.userList', compact('users'));
    }


    public function search(Request $request)
    {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $users = User::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('type', 'like', "%'$search'%")
         ->orderBy('id', 'desc')
        ->get();

    // Return the search view with the resluts compacted
    return view('admin.search', compact('users'));
    }

}
