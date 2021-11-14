@extends('layouts.app')

@section('content')
  <div class="container">
  <h1>TinyMCE Quick Start Guide</h1>
  <form method="post">
    <textarea id="mytextarea" name="mytextarea">
      Hello, World!
    </textarea>
  </form>
  </div>

@endsection

@section('foot-script')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>@endsection
