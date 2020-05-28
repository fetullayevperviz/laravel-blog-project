@extends("front.leyauts.master")
@section("title","Ana Səhifə")
@section("content") 
@include("front.widgets.categoryWidget")
      <div class="col-lg-9 col-md-10 mx-auto" style="border-left:1px solid #DCDCDC;">
         @include('front.widgets.articleList')
      </div>
@endsection

 