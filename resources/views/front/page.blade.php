@extends("front.leyauts.master")
@section("title",$page->title)
@section('bg',$page->image)
@section("content") 
      <div class="col-lg-11 col-md-11 mx-auto">
         <p style="text-align:justify;margin-left:45px;font-size:18px;">{!! $page->content !!}</p>
      </div>
      <hr>
@endsection


