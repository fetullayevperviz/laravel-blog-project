@extends('back.layouts.master')
@section('title','All Articles')
@section('content')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                  <button type="button" class="btn btn-success btn-sm text-white">All Articles</button>
                  <a href="{{route('admin.articles/deleted')}}" class="btn btn-danger btn-sm text-white float-right ml-3">
                  <i class="fa fa-trash">
                  </i>&nbsp; Deleted Articles</a>
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
                      <th>Status</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($articles as $article)
                      <tr class="text-center">
                          <td style="width:15%;">
                             <img src="{{asset('/').$article->image}}" style="width:150px;object-fit:cover;height:100px;">
                          </td>
                          <td style="width:15%;">{{$article->title}}</td>
                          <td style="width:10%;">{{$article->getCategory['category_name']}}</td>
                          <td style="width:5%;">{{$article->hit}}</td>
                          <td style="width:15%;">{{$article->created_at->diffForHumans()}}</td>
                          <td style="width:10%;">
                              @if($article->status == 0)
                                 <button type="button" class="btn btn-danger btn-sm text-white">Passive</button>
                              @else
                                 <button type="button" class="btn btn-success btn-sm text-white">Active</button>
                              @endif
                           </td>
                          <td style="width:30%;">
                             <a target="_blank" href="{{route('single',$article->slug)}}" title="Read" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Read</a>
                             <a href="{{route('admin.articles.edit',$article->id)}}" title="Edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                             <a href="{{route('admin.delete/article',$article->id)}}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection