@extends('layouts.app')

@section('content')
  <div class="container main-admin-post-show">
    <div class="row justify-content-center">

        <div class="col-md-6">

          <h1 class="text-capitalize">{{$post->title}}</h1>
          {{-- @if ($post->category)
            <h4>Categoria: <span class="text-uppercase"> {{$post->category->name}}</span></h4>
          @endif --}}

          @if ($post->cover)
            <img class="cover" src="{{asset($post->cover)}}" alt="{{$post->title}}">
          @endif

          <p>{{$post->content}}</p>

          {{-- @if ($post->tags)
            @foreach ($tags as $tag)
              <small>#{{$tag->name}}</small>
            @endforeach
          @endif --}}

          <div class="row justify-content-center">
            <a href="{{route('admin.posts.index')}}">
              <button class="btn btn-primary mr-5" type="button" name="button">
                Torna all'indice
              </button>

              <a class="mr-5" href="{{route('admin.posts.edit', ['post' => $post->id])}}">
                <button class="btn btn-primary" type="button" name="button">Modifica</button>
              </a>

              <form class="" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary" name="button">Cancella</button>
              </form>


            </a>
          </div>

        </div>


    </div>
  </div>

@endsection
