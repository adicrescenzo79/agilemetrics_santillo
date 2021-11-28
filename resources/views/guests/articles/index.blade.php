@extends('layouts.app')

@section('content')
<div id="main-guests-articles-index">
  <div class="container">
    <div class="row justify-content-center">

      <div v-for="article in articles" class="mb-3 col-md-4 px-3" style="max-width: 540px;">
        <div class="card">

          <div class="row no-gutters">
            <div class="col-md-4 img" :style="{ backgroundImage: 'url(' + article.cover + ')' }">
              {{-- <img :src="article.cover" alt="..."> --}}
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column justify-content-around">
                <a :href="'/articles/'+article.slug">
                  <h5 class="card-title text-uppercase"><b>@{{article.title}}</b></h5>
                </a>
                <p class="card-text">@{{article.content}}</p>
                <p class="card-date"><small class="text-muted">@{{article.created_at}}</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@section('foot-script')
<script src="{{asset('js/articles-index.js')}}" charset="utf-8"></script>
@endsection