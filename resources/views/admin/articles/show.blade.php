@extends('layouts.app')

@section('content')
<div id="main-admin-article-show" class="container-fluid ">
  <div class="row justify-content-center">

    <div class="col-md-11">

      {{-- @if ($article->category)
      <h4>Categoria: <span class="text-uppercase"> {{$article->category->name}}</span></h4>
      @endif --}}

      @if ($article->cover)
      <div class="jumbo" style="background-image: url('{{ asset($article->cover)}}');">
        <div class="text">
          <h1 class="my-caps">{{$article->title}}</h1>
          <h3 class="my-caps">{{$article->subtitle}}</h3>

        </div>
      </div>
      @else
      <h1 class="my-caps">{{$article->title}}</h1>
      <h3 class="my-caps">{{$article->subtitle}}</h3>

      @endif


      <div id="content"></div>


      {{-- @if ($article->tags)
      @foreach ($tags as $tag)
      <small>#{{$tag->name}}</small>
      @endforeach
      @endif --}}

      <div class="row justify-content-center">
        <a href="{{route('admin.articles.index')}}">
          <button class="btn btn-primary-pers mr-5" type="button" name="button">
            Torna all'indice
          </button>

          <a class="mr-5" href="{{route('admin.articles.edit', ['article' => $article->id])}}">
            <button class="btn btn-primary-pers" type="button" name="button">Modifica</button>
          </a>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary-pers" data-toggle="modal" data-target="#exampleModal">
            Cancella
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cancellazione articolo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Sicuro di voler cancellare questo articolo?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <form class="" action="{{route('admin.articles.destroy', ['article' => $article->id])}}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary-pers" name="button">Si</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



        </a>
      </div>

    </div>


  </div>
</div>

@endsection

@section('foot-script')
<script src="{{asset('js/admin-article-show.js')}}" charset="utf-8"></script>
@endsection