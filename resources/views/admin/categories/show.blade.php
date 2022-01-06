@extends('layouts.app')

@section('content')
  <div class="container main-admin-post-show">
    <div class="row justify-content-center">

        <div class="col-md-6">

          <h1>{{$category->name}}</h1>

          <div class="row justify-content-center">
            <a href="{{route('admin.categories.index')}}">
              <button class="btn btn-primary mr-5" type="button" name="button">
                Torna all'indice
              </button>

              <a class="mr-5" href="{{route('admin.categories.edit', ['category' => $category->id])}}">
                <button class="btn btn-primary" type="button" name="button">Modifica</button>
              </a>

              <form class="" action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
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
