@extends('layouts.app')

@section('content')
  <div id="main-welcome">

    {{-- AUTORIZZAZIONE COOKIES --}}
    <div v-if="!cookieConsentVar" id="cookies" class="position-absolute d-flex justify-content-center align-items-center">

      <div class="card cookies d-flex flex-column justify-content-center align-items-center pt-3 pb-3">
        <p class="text-center p-2">Questo sito utilizza i cookies per offrire un'esperienza migliore all'utente. </p>
        <button @click="cookieConsentFun()" class="cookieButton btn btn-primary-pers ml-3" type="button" name="button">Consenti i cookies</button>
      </div>
    </div>

    {{-- MAIN --}}
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="text-center">BENVENUTI IN AGILE METRICS</h1>

      </div>
    </div>

    {{-- ULTIMI POST --}}

    <div class="">

    </div>
  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
