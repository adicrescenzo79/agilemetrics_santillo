@extends('layouts.app')

@section('content')
<div id="main-welcome">


  {{-- MAIN --}}
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="text-center">BENVENUTI IN AGILE METRICS</h1>

    </div>
  </div>

  {{-- SLIDE ULTIMI POST --}}

  <div class="">
    <h1>post</h1>
  </div>
  
</div>
@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection