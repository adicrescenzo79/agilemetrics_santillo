<?php

namespace App\Http\Controllers\Admin;

use App\Article;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;


class ArticleController extends Controller
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
          $articles = Article::where('user_id', '=', $id)->get();
          return view('admin.articles.index', compact('articles'));
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
        return view('admin.articles.create');
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
          'subtitle' => 'nullable|string|max:255',
          'content' => 'required|string',
         // 'cover' => 'nullable|image|max:6000',
          'cover' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
          'visibility' => 'required|boolean',

          // 'tag_ids.*' => 'exists:tags,id',
        ]);
  
  
        $data = $request->all();
  
        $article = new Article();
        $article['user_id'] = Auth::id();
        $article->fill($data);
  
        $article->slug = $this->generateSlug($article->title);
  
        $cover = NULL;
        if (array_key_exists('cover', $data)) {
          $cover = Storage::put('uploads', $data['cover']);
          $article->cover = '../storage/' . $cover;
        }
  
        $article->save();
  
        // if (array_key_exists('tag_ids', $data)) {
        //   $article->tags()->attach($data['tag_ids']);
        // }
  
        // Mail::to('nail@mail.it')->send(new SendNewMail());
  
        return redirect()->route('admin.articles.index');
      }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            // 'category_id' => 'exists:categories,id|nullable',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'visibility' => 'required|boolean',
    
                // 'tag_ids.*' => 'exists:tags,id',
          ]);
    
          $data = $request->all();
    
          // qui va fatta la creazione dell'immagine
    
          $data['slug'] = $this->generateSlug($data['title'], $article->title != $data['title'], $article->slug);
    
          if (array_key_exists('cover', $data)) {
            $cover = Storage::put('uploads', $data['cover']);
            $data['cover'] = '../storage/' . $cover;
          }
    
    
    
          $article->update($data);
    
    
          // if (array_key_exists('tag_ids', $data)) {
          //   $article->tags()->sync($data['tag_ids']);
          // } else {
          //   $article->tags()->detach();
          // }
    
    
    
          $article->save();
    
          return redirect()->route('admin.articles.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index');
    }

    private function generateSlug(string $title, bool $change = true)
    {
    $slug = Str::slug($title, '-');

    if (!$change) {
        return $slug;
    }

    $slug_base = $slug;
    $contatore = 1;

    $article_with_slug = Article::where('slug', '=', $slug)->first();
    while ($article_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $article_with_slug = Article::where('slug', '=', $slug)->first();
    }
    return $slug;

    }

    
  
  
}