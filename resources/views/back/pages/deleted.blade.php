@extends('back.layouts.master')
@section('title','Deleted Articles')
@section('content')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                  <button type="button" class="btn btn-danger btn-sm text-white">All Deleted Articles</button>
                  <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-sm float-right ml-3">
                     <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back
                  </a>
                  <button type="button" class="btn btn-dark btn-sm text-white float-right">
                      Article Count : {{$articles->count()}}
                  </button>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Image</th>
                      <th>Article Title</th>
                      <th>Category</th>
                      <th>Hit</th>
                      <th>Creation Date</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($articles as $article)
                      <tr class="text-center">
                          <td style="width:15%;">
                             <img src="{{asset('/').$article->image}}" style="width:150px;object-fit:cover;height:100px;">
                          </td>
                          <td style="width:35%;">{{$article->title}}</td>
                          <td style="width:10%;">{{$article->getCategory['category_name']}}</td>
                          <td style="width:5%;">{{$article->hit}}</td>
                          <td style="width:15%;">{{$article->created_at->diffForHumans()}}</td>
                          <td style="width:20%;">
                             <a href="{{route('admin.recover/article',$article->id)}}" title="Back" class="btn btn-primary btn-sm">
                             <i class="fa fa-recycle"></i> Back</a>
                             <a href="{{route('admin.hard/delete/article',$article->id)}}" title="Delete" class="btn btn-danger btn-sm">
                             <i class="fa fa-trash"></i> Delete</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection