@extends('back.layouts.master')
@section('title','Create Page')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create Page</h6>
</div>
<div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
         @foreach($errors->all() as $error)
           <li>{{$error}}</li>
         @endforeach
      </div><!DOCTYPE html>
    @endif
    <form action="{{route('admin.page.create.post')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Page Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter page title" required>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label>Page Text</label>
                <textarea id="summernote" name="content" class="form-control" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Insert Page</button>
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