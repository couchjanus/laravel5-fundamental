<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::paginate(5);
        // var_dump($posts);
        return view('blog.index', ['posts' => $posts]);
    }

    public function list()
    {

        $posts = \App\Post::paginate(5);

        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::select("select * from posts where id = :id", ['id' => $id]);

        return view('blog.show', ['post' => $post, 'hescomment' => true ]);

    }

    // PostsController, метод showBySlug:
    public function showBySlug($slug) 
    {
        /** 
         * Вначале мы проверяем, не является ли слаг числом. 
         * Часто слаги внедряют в программу уже после того, 
         * как был другой механизм построения пути. 
         * Например, через числовые индексы. 
         * Тогда может получится ситуация, что пользователь, 
         * зайдя на сайт по старой ссылке, увидит 404 ошибку, 
         * что такой страницы не существует. 
        */
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

    public function getById($id)
    {
        // Получить конкретные записи с помощью find или first. 
        // Вместо коллекции моделей эти методы возвращают один экземпляр модели:

        // Получение модели по её первичному ключу...

        return  \App\Post::find($id);

        // return \App\Post::findOrFail($id);

        // return App\Post::where('id', '>', $id)->firstOrFail();

    }
    
    public function getFirstActive()
    {
        // Получить конкретные записи с помощью find или first. 
        // Вместо коллекции моделей эти методы возвращают один экземпляр модели:
        // Получение первой модели, удовлетворяющей условиям...

        return \App\Post::where('active', 1)->first();
        
    }
}
