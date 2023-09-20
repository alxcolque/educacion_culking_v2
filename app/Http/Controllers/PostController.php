<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts1 = Post::where('status',1)->orderBy('id', 'desc')->get();
        $posts2 = Post::where('status',2)->orderBy('id', 'desc')->get();
        $posts3 = Post::where('status',3)->orderBy('id', 'desc')->get();
        return view('posts.index', compact('posts1','posts2','posts3'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('title','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'extract' => 'required|string|max:256',
            'body' => 'required',
            'category_id' => 'required',
            'image_author' => 'required',
            'url' => ['file', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
            'type' => 'required'
        ]);
        $post = Post::create([
            'type' => $request->type,
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'extract' => $request->extract,
            'body' => $request->body,
            'status' => 1,
            'image_author' => $request->image_author
        ]);
        $miniature_file  = $request->file('url');
        if ($miniature_file) {
            $miniature = FileStorage::upload($miniature_file, $miniature_file->getClientOriginalName(), 'img/posts/'.$post->type);
            $post->url = $miniature;
            $post->save();
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        /* $data['slug'] = trim($data['name']);
        $data['category_id'] = 2;
        $data['user_id'] = $request->user()->id; */
        //dd($data);
        //$post = Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Noticia registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('author', $post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);
        $categories = Category::orderBy('title','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        $post_tags = DB::table('post_tag')->where('post_id',$post->id)->get();
        $post_tag = array();
        foreach($post_tags as $pt){
            array_push($post_tag, $pt->tag_id);
        }
        return view('posts.edit', compact('post', 'categories', 'tags', 'post_tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //$post->fill($request->post())->save();
        $request->validate([
            'type' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'extract' => 'required|string|max:256',
            'body' => 'required',
            'image_author' => 'required',
            'url' => ['file', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
            'type' => 'required'
        ]);
        $post->update([
            'type' => $request->type,
            'title' => $request->title,
            'extract' => $request->extract,
            'body' => $request->body,
            'status' => 1,
            'image_author' => $request->image_author
        ]);
        $post_file  = $request->file('url');
        if ($post_file) {
            FileStorage::delete($post->url, 'img/posts/'.$post->type);
            $image = FileStorage::upload($post_file, $post_file->getClientOriginalName(), 'img/posts/'.$post->type);
            $post->url = $image;
        }
        $post->save();

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        /* $data['slug'] = trim($data['name']);
        $data['category_id'] = 2;
        $data['user_id'] = $request->user()->id; */
        //dd($data);
        //$post = Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        FileStorage::delete($post->url, 'img/posts/'.$post->type);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'El registro se eliminó permanentemente.');
    }
    /* news with slug */
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 3)->first();
        //$this->authorize('status', $post);
        return view('posts.show_by_slug', compact('post'));
    }
    public function posts()
    {
        //$posts = Post::where('status', 3)->orderBy('id', 'desc')->get();
        $categories = Category::orderBy('title')->get();
        $tags = Tag::orderBy('name')->get();
        return view('posts.posts', compact('categories', 'tags'));
    }
    public function publish($id)
    {

        $post = Post::where('id', $id)->where('status', 1)->first();

        if($post){
            $this->authorize('author', $post);
            $post->status = 2;
            $post->save();
            return redirect()->back()->with("success", "Publicación en revisión...");
        }
        return redirect()->back()->with("warning", "Estamos revisando...");
    }
    public function cancel($id)
    {

        $post = Post::where('id', $id)->where('status', 2)->first();

        if($post){
            $this->authorize('author', $post);
            $post->status = 1;
            $post->save();
            return redirect()->back()->with("success", "Publicación está en borrador...");
        }
        return redirect()->back()->with("warning", "Estamos revisando...");
    }
    public function fail($id)
    {

        $post = Post::where('id', $id)->where('status', 2)->first();

        if($post){
            $this->authorize('author', $post);
            $post->status = 4;
            $post->save();
            return redirect()->back()->with("success", "Publicación está fue rechaza...");
        }
        return redirect()->back()->with("warning", "Estamos revisando...");
    }
    public function approve($id)
    {

        $post = Post::where('id', $id)->where('status', 2)->first();

        if($post){
            $this->authorize('author', $post);
            $post->status = 3;
            $post->save();
            return redirect()->back()->with("success", "Publicación está fue publicada exitosamente...");
        }
        return redirect()->back()->with("warning", "Estamos revisando...");
    }
    public function disabled($id)
    {

        $post = Post::where('id', $id)->where('status', 3)->first();

        if($post){
            $this->authorize('author', $post);
            $post->status = 5;
            $post->save();
            return redirect()->back()->with("success", "Publicación está fue desactivada...");
        }
        return redirect()->back()->with("warning", "Estamos revisando...");
    }
    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
            ->where('status', 3)
            ->latest('id')
            ->paginate(12);
        return view('posts.category', compact('posts','category'));
    }
    public function tag(Tag $tag){
        $posts = $tag->posts()->where('tag_id', $tag->id)->where('status',3)->latest('id')->paginate(12);
        return view('posts.tag', compact('posts','tag'));
    }
}
