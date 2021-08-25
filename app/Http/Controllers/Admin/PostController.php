<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      if ($id == 1) {
        $posts = Post::where('user_id', '=', $id)->get();
        return view('admin.posts.index', compact('posts'));
      } else {
        return view('security');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        // 'category_id' => 'exists:categories,id|nullable',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'cover' => 'nullable|image|max:6000',
        'visibility' => 'required|boolean',

        // 'tag_ids.*' => 'exists:tags,id',
      ]);


      $data = $request->all();

      $post = new Post();
      $post['user_id'] = Auth::id();
      $post->fill($data);

      $post->slug = $this->generateSlug($post->title);

      $cover = NULL;
      if (array_key_exists('cover', $data)) {
        $cover = Storage::put('uploads', $data['cover']);
        $post->cover = 'storage/' . $cover;
      }

      $post->save();

      // if (array_key_exists('tag_ids', $data)) {
      //   $post->tags()->attach($data['tag_ids']);
      // }

      // Mail::to('nail@mail.it')->send(new SendNewMail());

      return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate([
        // 'category_id' => 'exists:categories,id|nullable',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'cover' => 'nullable|image|max:6000',
        'visibility' => 'required|boolean',

        // 'tag_ids.*' => 'exists:tags,id',
      ]);

      $data = $request->all();

      // qui va fatta la creazione dell'immagine

      $data['slug'] = $this->generateSlug($data['title'], $post->title != $data['title'], $post->slug);

      if (array_key_exists('cover', $data)) {
        $cover = Storage::put('uploads', $data['cover']);
        $data['cover'] = 'storage/' . $cover;
      }



      $post->update($data);


      // if (array_key_exists('tag_ids', $data)) {
      //   $post->tags()->sync($data['tag_ids']);
      // } else {
      //   $post->tags()->detach();
      // }



      $post->save();

      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();

      return redirect()->route('admin.posts.index');
    }

    private function generateSlug(string $title, bool $change = true)
    {
      $slug = Str::slug($title, '-');

      if (!$change) {
        return $slug;
      }

      $slug_base = $slug;
      $contatore = 1;

      $post_with_slug = Post::where('slug', '=', $slug)->first();
      while ($post_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $post_with_slug = Post::where('slug', '=', $slug)->first();
      }
      return $slug;

    }

}
