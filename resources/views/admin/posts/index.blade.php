@extends('layouts.app')

@section('content')
  <div class="container " id="main-admin-posts-index">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <a href="{{route('admin.posts.create')}}">
          <button class="btn btn-primary" type="button" name="button">
            Scrivi un nuovo post
          </button>

        </a>
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach ($posts as $post)

        <div class="col-md-6 col-xl-3">
          <div class="card mt-3">
            <div class="card-header" >

              <a class="mr-5 text-capitalize" href="{{route('admin.posts.show', ['post' => $post->id])}}">
                {{ $post->title }}
              </a>
            </div>

            <div class="card-body d-flex flex-column justify-content-around">
              <div class="card-text">

                {{$post->content}}
              </div>
              <div class="row justify-content-center align-items-end flex-wrap mt-5">


                <a class="mr-5" href="{{route('admin.posts.edit', ['post' => $post->id])}}">
                  <button class="btn btn-primary" type="button" name="button">Modifica</button>
                </a>

                <form class="" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary" name="button">Cancella</button>
                </form>


                <!-- Button trigger modal -->
                {{-- <a href="#">

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Cancella
                  </button>
                </a> --}}

                <!-- Modal -->
                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <button type="submit" class="btn btn-primary" name="button">Si</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> --}}


              </div>
            </div>
          </div>
        </div>


      @endforeach
    </div>
  </div>

@endsection

@section('foot-script')
<script src="{{asset('js/admin-posts-index.js')}}" charset="utf-8"></script>
@endsection
