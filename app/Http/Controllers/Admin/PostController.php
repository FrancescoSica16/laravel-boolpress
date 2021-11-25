<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Richiedo tutte le categorie presenti e le richiamo inserendole in compact
        $categories = Category::all();

        $tags = Tag::all();

        $post = new Post();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione sull'inserimento
        $request->validate([
            // la chiave sarò il name corrispondente nel blade.php
            // il valore sarà la lista dei requisiti per la validazione
            'title' => 'required|string|unique:posts|max:120',
            // 'author' => 'required|string|max:60',
            'post_content' => 'required|string|min:40',
            'image_url' => "string|min:4"
        ],
        [
            "required" => 'Devi compilare correttamente :attribute',
            "title.required" => 'Non è possibile inserire un post senza titolo',
            // "author.max" => "Non è possibile inserire un autore con più di 60 caratteri",
            'post_content.min' => 'Il post deve essere lungo almeno 40 caratteri    '
        ]);

        
        $data = $request->all();

     
        $data['post_date'] = Carbon::now();

        $data['user_id'] = Auth::user()->id;
        
        $data['image_url'] = Storage::put('public', $data['image']);
        
        // $post = Post::create($data);
        $post = new Post();
        $post->fill($data);


        // $post->slug = Str::slug($post->title, '-');

        $post->save();
        //verifico che esista una chiave tags in data e aggiungo tutti i dati selezionati al post, lo scrivo dopo il salvataggio del post perchè ho bisogno che prima sia creato il post visto che mi serve l'id di post
        if(array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);

        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view("admin.posts.edit", compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['post_date'] = Carbon::now();

        $post->fill($data);
        // $post->slug = Str::slug($post->title, '-');
        $post->update();

        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with("deleted_title", $post->title )->with('alert-message', "$post->title è stato eliminato con successo");
    }
}
