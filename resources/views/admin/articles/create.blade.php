@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3>Nuovo Articolo</h3>
      </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">
          <form class="" action="{{route('admin.articles.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="subtitle">Subtitle</label>
              <input class="form-control @error('subtitle') is-invalid @enderror" type="text" id="subtitle" name="subtitle" value="{{old('subtitle')}}">
              @error('subtitle')
                <small class="text-danger">{{ $message }}</small>
              @enderror

            </div>

            <div class="form-group">
              <label for="cover">Cover</label>
                <input class="form-control-file @error('cover') is-invalid @enderror" id="cover" type="file" name="cover" value="">
              @error('cover')
                <small class="text-danger">{{ $message }}</small>
              @enderror

            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea id="myArticle" class="form-control @error('content') is-invalid @enderror" type="text" id="content" name="content" value="{{old('content')}}">
                <table style="border-collapse: collapse; width: 100%; border=0;">
                    <tbody>
                    <tr>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    </tr>
                    <tr>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    </tr>
                    <tr>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    </tr>
                    <tr>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    <td style="width: 24.2497%;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </textarea>

              @error('content')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>



            <div class="form-group">

              <div class="form-check">
                  <input class="form-check-input" type="radio" name="visibility" id="visible" value="1" checked>
                  <label class="form-check-label" for="visible">
                      Visibile a tutti i visitatori
                  </label>
              </div>

              <div class="form-check">
                  <input class=" form-check-input" type="radio" name="visibility" id="invisible" value="0">
                  <label class="form-check-label" for="invisible">
                    Visibile ai soli iscritti
                  </label>
              </div>

            </div>


            {{-- <div class="form-group">
              <label for="tags">Tags</label> <br>
                @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('tag_ids') is-invalid @enderror" type="checkbox" name="tag_ids[]" value="{{$tag->id}}" id="{{$tag->id}}">
                    <label class="form-check-label" for="{{$tag->id}}">
                      #{{$tag->name}}
                    </label>
                  </div>
                  @error('tag_ids')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                @endforeach
            </div> --}}



            <button type="submit" class="btn btn-primary-pers" name="button">Salva</button>

          </form>
        </div>

    </div>
  </div>

@endsection

@section('foot-script')
<script src="{{asset('js/article.js')}}" charset="utf-8"></script>
@endsection
