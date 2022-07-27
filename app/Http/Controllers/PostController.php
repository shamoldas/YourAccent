<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Post;
use App\Models\User;

use App\Models\Comment;

class PostController extends Controller
{
   

   public function __construct()
    {
        return $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //      $comments = Comment::all();
        $posts = Post::latest()->paginate(10);            
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
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
            'body' => 'required'
                ]);

            //$input = $request->all();

                $post = new Post;

                $post->user_id = $request->get('user_id');
                $post->title = $request->get('title');
                $post->body = $request->get('body');

                $post->save();
                return redirect('post');
    }








    public function edit($id)
        {
            $post = Post::find($id);
            return view('post.edit', compact('post'));
        }
    

    public function update(Request $request,$id)
        {
            
                 $request->validate([
            'title' => 'required',
            'body' => 'required'
                ]);
                 
                $post = Post::find($id);
                //$post = new Post;
                $post->title = $request->get('title');
                $post->body = $request->get('body');
                $post->save();
    
                return redirect()->route('post.index')
                        ->with('success','Post Updated successfully');
        }

    public function destroy(Post $post)
        {
        //
            $post->delete();            
            return redirect()->route('post')->with('success','Post Deleted successfully');
        }


     public function show($id)
        {
            $comments = Comment::all();
            $post = Post::find($id);
            
            //return view('post.show', compact('post','comments'));

            //return view('post.show', compact('post'));

              return View('post.show')->with(['post' => $post,'comments' => $comments]);
        }


     public function userposts()
        {
            $posts = Post::all();
            $posts=Post::paginate(10);
            return view('post.userpost', compact('posts'));
        }

     public function blog()
        {
            $posts = Post::latest()->paginate(10);            
            return view('post.index', compact('posts'));



             /*$posts = Post::all();
            //
            $posts = Post::latest()->paginate(1);            
            //return view('post.blog', compact('posts'));

             return view('post.show', compact('post'));
             */
        }

        public function myPost()
        {
            //
            $users = User::all();
            //$posts = Post::latest()->paginate(10); 
            //$posts = Posts::where('user_id','=',auth()->user()->id)->findOrFail($id);

            //$posts = Post::where('user_id','=',Auth::user()->id);
            $posts = Post::where('user_id', Auth::user()->id)->get();

            //$posts = $user->posts()->get();
            //$posts = Post::with('user')->get();           
            //return view('manager.mypost', compact('posts','users'));

           // $posts = Post::all();

            return view('manager.mypost', compact('posts'));
        }

}
