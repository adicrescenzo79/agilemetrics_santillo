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
            <div class="carousel" :style="{ left: - carouselLeft + 'vw' }">
              <div class="slide d-flex align-items-center" :style="{ marginLeft: - move + 'vw' }">
                <a class="item pointer" v-for="(item, i) in posts"
                  :style="{ backgroundImage: 'url(' + item.cover + ')' } " :class="activePost == i ? 'active' : ''"
                  :href="'/posts/' + item.slug">
                </a>
              </div>
              <div class="low-bar d-flex flex-column align-items-center justify-content-center">

                <div id="post-title" class="item-text flex-column" v-if="posts.length">
                  <h2 class="my-caps">@{{posts[activePost].title}}</h2>
                </div>
                <div class="my-controls d-flex align-items-center justify-content-center">

                  <div class="my-prev" @click="prevPost()">
                    <i class="fas fa-chevron-left"></i>
                  </div>
                  <div class="my-dots">
                    <i v-for="(dot, i) in posts.length" :class="i == activePost ? 'fas' : 'far'" class="fa-circle dot"
                      @click="selectPost(i)"></i>
                  </div>
                  <div class="my-next" @click="nextPost()">
                    <i class="fas fa-chevron-right"></i>
                  </div>
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