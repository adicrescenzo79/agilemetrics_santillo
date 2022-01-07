@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Invita un nuovo utente VIP</h1>

        <form class="mt-5" action="{{route('admin.mail.vipstore')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group" >
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{old('email')}}">
                @error('email')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary-pers" name="button">Invita</button>

  
        </form>


    </div>
@endsection
