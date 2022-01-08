@extends('layouts.app')

@section('content')
  <div id="main-article-create-edit" class="container-fluid ">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3>Modifica Article</h3>
      </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">
          <form enctype="multipart/form-data"  class="" action="{{route('admin.articles.update', ['article' => $article->id])}}" method="post">
            @csrf
            @method('PATCH')

            {{-- <div class="form-group">
              <label for="category">Categoria</label>
              <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old('category_id', $article->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
              </select>
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div> --}}

            <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title', $article->title)}}">
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="subtitle">Subtitle</label>
              <input class="form-control @error('subtitle') is-invalid @enderror" type="text" id="subtitle" name="subtitle" value="{{old('subtitle', $article->subtitle)}}">
              @error('subtitle')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group img-upload" >
              @if ($article->cover)
                <div class="d-flex flex-column w-20" v-if="oldNotChanged">
                  <img class=" w-100 d-none" id="old-pic" src="{{asset($article->cover)}}" alt="">
                </div>
                
                <label v-if="!cover" for="cover">
                  {{-- <img :src="url('/media/icons/svg/camera.svg')" alt="" /> --}}
                  <span class="btn-primary-pers btn ">
                    scegli una cover
                  </span>
                </label>
  
                
                <div v-else class="d-flex flex-column w-20">
                  <img class="loaded cover w-100" :src="cover" />
                  <button class="btn btn-primary-pers w-100" @click="removeImage">
                    rimuovi la cover
                  </button>
                </div>
  
                <input :name="uploadCover" type="file" class="
                    form-control-file
                    link-ret
                    green
                    btn btn-my-primary
                    d-none  @error('cover') is-invalid @enderror
                  " id="cover" value="" @change="onFileChange" />
                @error('cover')
                <small class="text-danger">{{ $message }}</small>
                @enderror

              @else

              <label v-if="!cover" for="cover">
                {{-- <img :src="url('/media/icons/svg/camera.svg')" alt="" /> --}}
                <span class="btn-primary-pers btn ">
                  scegli una cover
                </span>
              </label>
              <div v-else class="d-flex flex-column w-20">
                <img class="loaded cover w-100" :src="cover" />
                <button class="btn btn-primary-pers w-100" @click="removeImage">
                  rimuovi la cover
                </button>
              </div>
              <input :name="uploadCover" type="file" class="
                  form-control-file
                  link-ret
                  green
                  btn btn-my-primary
                  d-none  @error('cover') is-invalid @enderror
                " id="cover" value="" @change="onFileChange" />
              @error('cover')
              <small class="text-danger">{{ $message }}</small>
              @enderror
    

              @endif


              
    
            </div>


            <div class="form-group">
              <label for="content">Content</label>
              <textarea id="myarticle" class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8" cols="80">{{old('content', $article->content)}}</textarea>
              @error('content')
                <small class="text-danger">{{ $message }}</small>
              @enderror

            </div>





            <div class="form-group">
              <label for="visibility">Chi può vedere questo contenuto?</label>
              <select class="form-control @error('visibility') is-invalid @enderror" id="visibility" name="visibility">
                <option value="all" {{'all' == old('visibility', $article->visibility) ? 'selected' : ''}}>Tutti i visitatori</option>
                <option value="standard" {{'standard' == old('visibility', $article->visibility) ? 'selected' : ''}}>Solo gli utenti registrati</option>
                <option value="vip" {{'vip' == old('visibility', $article->visibility) ? 'selected' : ''}}>Solo gli utenti VIP</option>

              </select>
              @error('visibility')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>


            {{-- <div class="form-group">
              <label for="tags">Tags</label> <br>
                @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('tag_ids') is-invalid @enderror" type="checkbox" name="tag_ids[]" value="{{$tag->id}}" id="{{$tag->id}}" {{$article->tags->contains($tag) ? 'checked' : ''}}>
                    <label class="form-check-label" for="{{$tag->id}}">
                      #{{$tag->name}}
                    </label>
                  </div>
                  @error('tag_ids')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                @endforeach
            </div> --}}
            <a class="inline-block btn btn-primary-pers" href="{{route('admin.articles.index')}}">Annulla</a>


            <button type="submit" class="btn btn-primary-pers" name="button">Salva</button>

          </form>
        </div>

    </div>
  </div>

@endsection

@section('foot-script')
<script src="{{asset('js/article.js')}}" charset="utf-8"></script>
@endsection
