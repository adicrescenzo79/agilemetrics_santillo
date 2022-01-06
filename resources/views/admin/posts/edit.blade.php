@extends('layouts.app')

@section('content')
  <div id="main-admin-posts-edit" class="container ">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3>Modifica Post</h3>
      </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">
          <form enctype="multipart/form-data"  class="" action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
              <label for="category">Categoria</label>
              <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
              </select>
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title', $post->title)}}">
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8" cols="80">{{old('content', $post->content)}}</textarea>
              @error('content')
                <small class="text-danger">{{ $message }}</small>
              @enderror

            </div>




            <div class="form-group">
              @if ($post->cover)
                <div class="">
                  <img class="cover" src="{{asset($post->cover)}}" alt="">
                  <small class="text-danger">Attuale</small>
                </div>
              @endif

              <label for="cover">Cover</label>
                <input class="form-control-file @error('cover') is-invalid @enderror" id="cover" type="file" name="cover" value="">
              @error('cover')
                <small class="text-danger">{{ $message }}</small>
              @enderror

            </div>

            <div class="form-group">

              <div class="form-check">
                <input class="form-check-input" type="radio" name="visibility" id="visible" value="1" {{ ($post->visibility == 1) ? "checked" : "" }}>
                <label class="form-check-label" for="visible">
                  Visibile a tutti i visitatori
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="visibility" id="invisible" value="0" {{ ($post->visibility == 0) ? "checked" : "" }}>
                <label class="form-check-label" for="invisible">
                  Visibile ai soli iscritti
                </label>
              </div>
            </div>


            <div class="form-group">
              <label for="tags">Tags</label> <br>
                @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('tag_ids') is-invalid @enderror" type="checkbox" name="tag_ids[]" value="{{$tag->id}}" id="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
                    <label class="form-check-label" for="{{$tag->id}}">
                      #{{$tag->name}}
                    </label>
                  </div>
                  @error('tag_ids')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                @endforeach
            </div>
            <a class="inline-block btn btn-primary-pers" href="{{route('admin.posts.index')}}">Annulla</a>


            <button type="submit" class="btn btn-primary-pers" name="button">Salva</button>

          </form>
        </div>

    </div>
  </div>

@endsection
