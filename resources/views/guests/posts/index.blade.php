@extends('layouts.app')

@section('content')
  <div id="main-guests-posts-index">
    <div class="container">
      <div class="row justify-content-center">

        <div  v-for="post in posts" class="card mb-3 col-md-4" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4 img" :style="{ backgroundImage: 'url(' + post.cover + ')' }">
              {{-- <img :src="post.cover" alt="..."> --}}
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <a :href="'/posts/'+post.slug"><h5 class="card-title">@{{post.title}}</h5></a>
                <p class="card-text">@{{post.content}}</p>
                <p class="card-text"><small class="text-muted">@{{post.created_at}}</small></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('foot-script')
<script src="{{asset('js/posts-index.js')}}" charset="utf-8"></script>
@endsection
