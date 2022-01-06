@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <a href="{{route('admin.tags.create')}}">
          <button class="btn btn-primary" type="button" name="button">
            Crea nuovo tag
          </button>

        </a>
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach ($tags as $tag)

        <div class="col-md-3">
          <div class="card mt-4">
            <div class="card-header">

              <a class="mr-5" href="{{route('admin.tags.show', ['tag' => $tag->id])}}">
                {{ $tag->name }}
              </a>
            </div>

            <div class="card-body">
              <div class="row justify-content-center mt-5">
                <a class="mr-5" href="{{route('admin.tags.edit', ['tag' => $tag->id])}}">
                  <button class="btn btn-primary" type="button" name="button">Modifica</button>
                </a>
                <form class="" action="{{route('admin.tags.destroy', ['tag' => $tag->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary" name="button">Cancella</button>
                </form>
              </div>
            </div>
          </div>
        </div>


      @endforeach
    </div>
  </div>

@endsection
