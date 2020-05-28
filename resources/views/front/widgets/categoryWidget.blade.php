@isset($categories)
<div class="col-lg-3 col-md-2">
    <div class="list-group">
        @foreach($categories as $category)  
            @if($category->id != 1)
               <a href="{{route('category',$category->slug)}}" 
               class="list-group-item list-group-item-action justify-content-between d-flex align-items-center 
               @if(Request::segment(2)==$category->slug) active @endif ">{{$category->category_name}}
               <span class="badge badge-primary badge-pill">{{$category->articleCount()}}</span></a>
            @endif
        @endforeach  
    </div>
</div>
@endif