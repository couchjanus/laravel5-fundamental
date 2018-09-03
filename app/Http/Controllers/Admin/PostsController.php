<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Validator;
use App\Post;
use App\Category;
use App\Tag;
use Gate;
use Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    public function getPosts()
    {
        $posts = \App\Post::where('user_id', '=', Auth::id())->get();

        return view(
            'admin.posts.index', 
            [
                'posts' => $posts,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = \App\Category::all();
        $tags = Tag::all();
        return view('admin.posts.create')
            ->with('categories', $categories)
            ->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = $request->all();
        $post->user_id = Auth::user()->id;
        $post = new Post($post);
        $post->save();
        $post->tags()->sync($request->tags, false);
        return redirect(route('posts.index'))
            ->with('message', 'An article has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.show', $data);
    }

    // PostsController, метод showBySlug:
    public function showBySlug($slug) 
    {
        if (is_numeric($slug)) {
            // Get post for slug.
            $post = Post::findOrFail($slug);
            
            return Redirect::to(route('blog.show', $post->slug), 301); 
            // 301 редирект со старой страницы, на новую.    
        }
        // Get post for slug.
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.show', [
            'post' => $post,
            'hescomment' => true
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = \App\Category::pluck('name', 'id');
        // $tags = Tag::pluck('name', 'id');
        $tags = Tag::all();
        if (Gate::allows('update-post', $post)) {
            // Текущий пользователь может редактировать статью...
            return view('admin.posts.edit')
                ->withPost($post)
                ->withCategories($categories)
                ->withTags($tags);
        }

        dd(Auth::user()->id);
    }

    public function editPost($id)
    {
        $post = \App\Post::findOrFail($id);

        if (Gate::allows('update-post', $post)) {
            // Текущий пользователь может редактировать статью...
            return view('blog.edit', [
                'post' => $post,
                ]
            );  
        }
        

        if (Gate::denies('update', $post)) {
            abort(403);
        }

        if (policy($post)->update($user, $post)) {
            //
        }
          

        if (Gate::denies('update-post', $post)) {
            // Текущий пользователь не может редактировать статью...
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
        $post = Post::findOrFail($id);

        if ($request->user()->cannot('update-post', $post)) {
            abort(403);
        }

        if ($request->user()->can('update-post', $post)) {
            // Обновление статьи...
        }

        $this->authorize('update', $post);
  
        // Обновление статьи...
        // $this->authorizeForUser($user, 'update', $post);  
        
        // $this->authorize($post);


        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->is_active = $request->is_active;
        
        $post->save();
        
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        return redirect(route('posts.index'))
            ->with('message', 'An article has been updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);

        if (Gate::forUser($user)->allows('destroy-post', $post)) {
            // Пользователь может удалять статью...
            dd('Пользователь '.$user->name.' может удалять статью...');
            
            $post->tags()->detach();
            $post->delete();

            return redirect(route('posts.index'))
                ->with('message', 'An article has been deleted');
        }
          
        if (Gate::forUser($user)->denies('destroy-post', $post)) {
            // Пользователь не может удалять статью...
            dd('Пользователь '.$user->name.' не может удалять статью...');
            return redirect(route('posts.index'))
            ->with('message', 'Пользователь '.$user->name.' не может удалять статью...');
        }

        if ($user->can('destroy', $post)) {
            //
        }
          
        if ($user->cannot('destroy', $post)) {
            //
        }
        // $post->tags()->detach();
        // $post->delete();

        // return redirect(route('posts.index'))
        //     ->with('message', 'An article has been deleted');
    }
}
