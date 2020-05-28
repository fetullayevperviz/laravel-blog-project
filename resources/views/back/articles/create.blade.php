@extends('back.layouts.master')
@section('title','Create Article')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Article</h6>
    </div>
    <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
             @foreach($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
          </div><!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Example Title</title>
	<meta name="author" content="Your Name">
	<meta name="description" content="Example description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
	<header></header>
	<main></main>
	<footer></footer>
	<script type="text/javascript" src=""></script>
</body>

</html>
        @endif
        <form action="{{route('admin.articles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Article Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Article Category</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Article Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter article title" required>
                </div>
                <div class="form-group">
                    <label>Article Text</label>
                    <textarea id="summernote" name="content" class="form-control" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Insert Article</button>
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