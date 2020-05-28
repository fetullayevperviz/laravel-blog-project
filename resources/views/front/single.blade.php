@extends("front.leyauts.master")
@section("title",$article->title)
@section('bg',asset('/').$article->image)
@section("content") 
@include("front.widgets.categoryWidget")
       <!-- Post Content -->
    <div class="col-lg-9 col-md-10 mx-auto" style="border-left:1px solid #DCDCDC;">
        {!!$article->content!!}  <br><br>
        <span style="color:red;float:right;">Oxunma sayı : <b>{{$article->hit}}</b></span>
    </div>
    
  <hr>
 
@endsection

  





