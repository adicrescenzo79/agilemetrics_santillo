@extends('layouts.app')

@section('content')
  <div id="main-admin-post-show" class="container ">
    <div class="row justify-content-center">

        <div class="col-md-6">

          <h1 class="text-capitalize">{{$post->title}}</h1>
          @if ($post->category)
            <h4>Categoria: <span class="text-uppercase"> {{$post->category->name}}</span></h4>
          @endif

          @if ($post->cover)
            <img class="cover" src="{{asset($post->cover)}}" alt="{{$post->title}}">
          @endif

          <p>{{$post->content}}</p>

          @if ($post->tags)
            @foreach ($tags as $tag)
              <small>#{{$tag->name}}</small>
            @endforeach
          @endif

          <div class="row justify-content-center">
            <a href="{{route('admin.posts.index')}}">
              <button class="btn btn-primary-pers mr-5" type="button" name="button">
                Torna all'indice
              </button>

              <a class="mr-5" href="{{route('admin.posts.edit', ['post' => $post->id])}}">
                <button class="btn btn-primary-pers" type="button" name="button">Modifica</button>
              </a>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary-pers" data-toggle="modal" data-target="#exampleModal">
                Cancella
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cancellazione post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Sicuro di voler cancellare questo post?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <form class="" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
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
