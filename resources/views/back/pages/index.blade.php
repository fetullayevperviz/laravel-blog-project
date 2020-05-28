@extends('back.layouts.master')
@section('title','All Pages')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
          <button type="button" class="btn btn-success btn-sm text-white">All Pages</button>
          <button type="button" class="btn btn-dark btn-sm text-white float-right">
              Page Count : {{$pages->count()}}
          </button>
      </h6>
    </div>
    <div class="card-body">
      <div id="orderSuccess" style="display:none;" class="alert alert-success text-center">
         Order Successfully Updated
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Orders</th>
              <th>Image</th>
              <th>Page Title</th>
              <th>Status</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody id="orders">
              @foreach($pages as $page)
              <tr class="text-center" id="page_{{$page->id}}">
                  <td style="width:10%;"><i class="fas fa-expand-arrows-alt fa-5x handle" style="cursor:move;"></i></td>
                  <td style="width:20%;">
                     <img src="{{asset($page->image)}}" style="width:150px;object-fit:cover;height:100px;">
                  </td>
                  <td style="width:25%;">{{$page->title}}</td>
                  <td style="width:15%;">
                      @if($page->status == 0)
                         <button type="button" class="btn btn-danger btn-sm text-white">Passive</button>
                      @else
                         <button type="button" class="btn btn-success btn-sm text-white">Active</button>
                      @endif
                   </td>
                  <td style="width:30%;">
                     <a target="_blank" href="{{route('page',$page->slug)}}" title="Read" class="btn btn-info btn-sm">
                      <i class="fa fa-eye"></i> Show</a>
                     <a href="{{route('admin.page.edit',$page->id)}}" title="Edit" class="btn btn-primary btn-sm">
                      <i class="fa fa-edit"></i> Edit</a>
                     <a href="{{route('admin.page.delete',$page->id)}}" title="Delete" class="btn btn-danger btn-sm">
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
