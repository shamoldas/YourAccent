<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

use Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
        $comments = Comment::all();       
        //$comments = Comment::all()->toArray();
       return view('partials._comment_replies', compact('comments'));
       // return view('post.booklist', compact('comments'));

        /*

        $comments = Comment::all();
        $post = Post::find($id);

        return View('post.show')->with(['post' => $post,'comments' => $comments]);
        */
        
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
    /*
    public function store(Request $request)
    {
        //
    }
    */


    public function store(Request $request)
        {
            
                $comment = new Comment;
                $comment->body = $request->get('comment_body');
                $comment->user()->associate($request->user());
                $post = Post::find($request->get('post_id'));
               // $post = Post::find($request->get('parent_id'));
                $post->comments()->save($comment);

                return back();

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




        public function replyStore(Request $request)
        {
                $reply = new Comment();
                $reply->body = $request->get('comment_body');
                $reply->user()->associate($request->user());
                $reply->parent_id = $request->get('comment_id');
                $post = Post::find($request->get('post_id'));
                $post->comments()->save($reply);
                return back();
        }

       public function myComment()
        {
            //
            $users = User::all();

            //$posts = Post::latest()->paginate(10); 
            //$posts = Posts::where('user_id','=',auth()->user()->id)->findOrFail($id);

            //$posts = Post::where('user_id','=',Auth::user()->id);
            $comments = Comment::where('user_id', Auth::user()->id)->get();

            //$posts = $user->posts()->get();
            //$posts = Post::with('user')->get();           
            //return view('manager.mypost', compact('posts','users'));

           // $posts = Post::all();

            return view('user.myComment', compact('comments'));
        }

}



