@extends('layouts.app')

@section('content')
  <div id="main-welcome">
    <div class="container">
      <div class="row justify-content-center">
        <h1>BENVENUTI IN AGILE METRICS</h1>

      </div>
    </div>
  </div>
@endsection

@section('foot-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.6/dayjs.min.js" integrity="sha512-bwD3VD/j6ypSSnyjuaURidZksoVx3L1RPvTkleC48SbHCZsemT3VKMD39KknPnH728LLXVMTisESIBOAb5/W0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
