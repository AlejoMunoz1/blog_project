<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
/*use resources\views\dashboard\post\create;*/
/*use App\Http\Controllers\Dashboard\to_route;*/


use function PHPUnit\Framework\returnSelf;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        /*if(!Gate::allows('index', $posts[0])){
            abort(403);
        }*/

        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        /*if(!Gate::allows('create', $posts[0])){
            abort(403);
        }*/
        $task = 'create';
        return view('dashboard.post.create', compact('categories', 'post', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $post = new Post($request->validated());
        /*return to_route('post.index')->with('status', "nuevo post creado");*/
        return redirect()->route('posts')->with('status',  "nuevo post creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        /* if (!Gate::allows('update', $post)) {
            abort(403);
        } */

        $task = 'edit';
        return view('dashboard.post.edit', compact('categories', 'post', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = $filename = time().".".$data['image']->extension();
            $request->image->move(public_path('images/otro'), $filename);
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('status', 'Publicación actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         /* if (!Gate::allows('delete', $post)) {
            abort(403);
        } */
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Publicación eliminada');
    }
}
