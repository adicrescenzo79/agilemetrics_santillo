@extends('layouts.app')

@section('content')
<div id="main-welcome">


  {{-- MAIN --}}
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="text-center">BENVENUTI IN AGILE METRICS</h1>

    </div>
  </div>

  <div v-if="cookieMsg" id="cookies" class="modal flex d-flex align-items-center justify-content-center position-fixed" tabindex="-1" v-cloak>
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cookies</h5>
          <button  @click="cookieMsg = false"  type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Per una migliore fruizione dei contenuti si consiglia l'utilizzo dei cookies</p>
        </div>
        <div class="modal-footer">
          <button @click="cookieMsg = false"  type="button" class="btn btn-secondary-pers" data-dismiss="modal">Chiudi</button>
          <button @click="cookieConsentFun()" type="button" class="btn btn-primary-pers">Accetta i cookies</button>
        </div>
      </div>
    </div>
  </div>


  {{-- SLIDE ULTIMI POST --}}


  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-12" id="carousel" v-if="carouselLoaded">


          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <a class="carousel-item pointer" v-for="(item, i) in mixedItems" v-if="item != undefined" :id="i"
                :href="'/'+item.type+'/'+item.slug">
                <div class="external w-100 ">
                  <div class="internal " :style="{ backgroundImage: `url(${item.cover})` }">

                  </div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                  <h1 class="my-caps">@{{item.title}}</h1>
                  <h6 v-if="item.type == 'articles'">
                    Articolo
                  </h6>
                  <h6 v-else-if="item.type == 'posts'">
                    Post
                  </h6>
                  <h5>@{{item.created_at}}</h5>
                  {{-- <ol class="carousel-indicators">
                    <li v-for="(line, i) in mixedItems.length" data-target="#carouselExampleIndicators" :data-slide-to="i"
                      class="active"></li>
                  </ol> --}}
      
                </div>
              </a>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
              data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
              data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>













        </div>
      </div>
    </div>
  </section>





</div>
@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection