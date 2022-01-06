@extends('layouts.app')



@section('content')
  <div id="main-guests-articles-show" class="container-fluid">

    <div v-if="article.cover" class="jumbo" :style="background">
      <div class="container  d-flex justify-content-center align-items-end">
        <h1 class="shadow-lg rounded p-3 text-capitalize">@{{article.title}}</h1>

      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-6">

          <h1 v-if="!article.cover" class="shadow-lg rounded p-3 text-capitalize">@{{article.title}}</h1>
          {{-- @if ($article->category)
            <h4>Categoria:
              <a class="text-uppercase" href="{{ route('category.index', ['slug' => $article->category->slug])}}">{{$article->category->name}}</a>
            </h4>
          @endif --}}

          {{-- <img v-if="article.cover" class="cover" :src="article.cover" :alt="article.title"> --}}

          {{-- <div class="col-md-4 img" :style="{ backgroundImage: 'url(' + article.cover + ')' }">
          </div> --}}
          <img src="" alt="">



          <div id="content"></div>

          {{-- <div class="">
            @foreach ($article->tags as $tag)
              <a href="{{ route('tag.index', ['slug' => $tag->slug])}}">#{{$tag->name}}</a>
            @endforeach
          </div> --}}

          <div class="row justify-content-center">
            <a href="{{route('articles.index')}}">
              <button class="btn btn-primary-pers mr-5" type="button" name="button">
                Torna all'indice degli articoli
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
  <script src="{{asset('js/article-show.js')}}" charset="utf-8"></script>
@endsection
