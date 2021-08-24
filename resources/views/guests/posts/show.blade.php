@extends('layouts.app')

@section('content')
  <div id="main-guests-posts-show">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-6">

          <h1 class="text-capitalize">@{{post.title}}</h1>
          {{-- @if ($post->category)
            <h4>Categoria:
              <a class="text-uppercase" href="{{ route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a>
            </h4>
          @endif --}}

          <img v-if="post.cover" class="cover" :src="post.cover" :alt="post.title">

          <p>@{{post.content}}</p>

          {{-- <div class="">
            @foreach ($post->tags as $tag)
              <a href="{{ route('tag.index', ['slug' => $tag->slug])}}">#{{$tag->name}}</a>
            @endforeach
          </div> --}}

          <div class="row justify-content-center">
            <a href="{{route('posts.index')}}">
              <button class="btn btn-primary mr-5" type="button" name="button">
                Torna all'indice dei post
              </button>
            </a>
            <a href="{{route('welcome')}}">
              <button class="btn btn-primary mr-5" type="button" name="button">
                Torna all'home page
              </button>
            </a>

          </div>

        </div>


      </div>

    </div>
  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/post-show.js')}}" charset="utf-8"></script>
@endsection