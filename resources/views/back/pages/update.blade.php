@extends('back.layouts.master')
@section('title','Update Page : '.$page->title)
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Page</h6>
    </div>
    <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
             @foreach($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
          </div>
        @endif
        <form action="{{route('admin.page.edit.post',$page->id)}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                              <!---->
                               <img src="{{asset('/').$page->image}}" style="height:100px;width:200px;object-fit:cover;">
                            </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label>Page Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                       </div>
                    </div>             
                </div>
                <div class="col-md-6">
                     <label>Status</label>
                     <select name="status" class="form-control" required>
                        @if($page->status==0)
                         <option value="0" selected>Passive</option>
                         <option value="1">Aktive</option>
                         @else
                         <option value="0">Passive</option>
                         <option value="1" selected>Active</option>
                        @endif
                     </select>
                  </div>
                </div>
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" placeholder="Enter page title" required>
                </div>
                <div class="form-group">
                    <label>Page Text</label>
                    <textarea id="summernote" name="content" class="form-control" cols="30" rows="5" required>{!!$page->content!!}</textarea>
                </div>
                <div class="form-group">
                    <a type="button" href="{{route('admin.page.index')}}" class="btn btn-dark text-white">
                    <i class="fas fa-arrow-left"></i>&nbsp; Back</a>
                    <button type="submit" class="btn btn-success float-right">Update Page</button>
                </div>
        </form>
    </div>
    </div>
@endsection
@section('summernote_css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('summertnote_js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
        height: 200
    });
  });
</script>
@endsection