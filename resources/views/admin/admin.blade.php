@extends('admin.layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_welc">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
      <H1>YOU ARE ADMIN</H1>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 ">
        @include('layouts.sidebar')
      </div>
    </div>
  </div>
</div>


  <div id="footer">
  @include('admin.layouts.footer')
  </div>
@endsection

