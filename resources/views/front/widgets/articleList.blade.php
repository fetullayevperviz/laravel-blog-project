@if(count($articles)>0)
@foreach($articles as $article)
<div class="post-preview">
    <a href="{{route('single',$article->slug)}}">
    <h3>
        {{$article->title}}
    </h3>
    <img src="{{$article->image}}" style="width:800px;height:400px;object-fit:cover;">
    <p class="post-subtitle">
        {!!Str::limit($article->content,95)!!}
    </p>
    </a>
    <p class="post-meta">
    <a href="{{route('single',$article->slug)}}">Kateqoriya : {{$article->getCategory['category_name']}}</a>
    <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
    </p>
</div>
@if(!$loop->last)
<hr>
@endif
@endforeach

<div class="row justify-content-center" style="margin-top:70px;">
{{$articles->Links()}}
</div>
@else
       <div class="row justify-content-center alert alert-danger">
         <h3 style="color:black;">Bu kateqoriyaya uyğun nəticə tapılmadı</h3>
       </div>
@endif