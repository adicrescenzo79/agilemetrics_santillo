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

    <section id="posts">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="carousel">
              <div
                class="slide d-flex align-items-center"
                :style="{ left: 25 + move + 'vw' }"
              >
                <div
                  class="item"
                  v-for="(item, i) in posts"
                  :style="{ backgroundImage: 'url(' + item.cover + ')' }"
                  :class="activePost == i ? 'active' : ''"
                >
                  <div class="item-text flex-column">
                    <h2 class="my-caps">prova testo item</h2>
                    <a class="link-ret green btn btn-my-primary" href="">Scopri</a>
                  </div>
                </div>
              </div>
              <div
                class="my-controls d-flex align-items-center justify-content-center"
              >
                <div class="my-prev" @click="prev()">
                  <i class="fas fa-chevron-left"></i>
                </div>
                <div class="my-dots">
                  <i
                    v-for="(dot, i) in posts.length"
                    :class="i == activePost ? 'fas' : 'far'"
                    class="fa-circle dot"
                    @click="select_item(i)"
                  ></i>
                </div>
                <div class="my-next" @click="next()">
                  <i class="fas fa-chevron-right"></i>
                </div>
              </div>
            </div>
              </div>
        </div>
      </div>
    </section>



  </div>

</div>
@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection

{{-- :class="activePost == i ? 'active' : ''" --}}