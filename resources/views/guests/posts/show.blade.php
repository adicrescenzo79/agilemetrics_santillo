@extends('layouts.app')



@section('content')
  <div id="main-guests-posts-show">

    <div v-if="post.cover" class="jumbo" :style="background">
      <div class="container  d-flex justify-content-center align-items-end">
        <h1 class="shadow-lg rounded p-3 text-capitalize">@{{post.title}}</h1>

      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-6">

          <h1 v-if="!post.cover" class="shadow-lg rounded p-3 text-capitalize">@{{post.title}}</h1>
          {{-- @if ($post->category)
            <h4>Categoria:
              <a class="text-uppercase" href="{{ route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a>
            </h4>
          @endif --}}

          {{-- <img v-if="post.cover" class="cover" :src="post.cover" :alt="post.title"> --}}

          {{-- <div class="col-md-4 img" :style="{ backgroundImage: 'url(' + post.cover + ')' }">
          </div> --}}
          <img src="" alt="">



          <p>@{{post.content}}</p>

          {{-- <div class="">
            @foreach ($post->tags as $tag)
              <a href="{{ route('tag.index', ['slug' => $tag->slug])}}">#{{$tag->name}}</a>
            @endforeach
          </div> --}}

          <div class="row justify-content-center">
            <a href="{{route('posts.index')}}">
              <button class="btn btn-primary-pers mr-5" type="button" name="button">
                Torna all'indice dei post
              </button>
            </a>
            <a href="{{route('welcome')}}">
              <button class="btn btn-primary-pers mr-5" type="button" name="button">
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
