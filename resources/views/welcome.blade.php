@extends('layouts.app')

@section('content')
  <div id="main-welcome">

    <div v-if="!cookieConsentVar" id="cookies" class="container">

      <div class="cookies d-flex justify-content-center align-items-baseline pt-3 pb-3">
        <p>Questo sito utilizza i cookies per offrire un'esperienza migliore all'utente. </p>
        <button @click="cookieConsentFun()" class="cookieButton btn btn-primary ml-3" type="button" name="button">Consenti i cookies</button>
      </div>
    </div>


    <div class="container">
      <div class="row justify-content-center">
        <h1>BENVENUTI IN AGILE METRICS</h1>

      </div>
    </div>
  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
