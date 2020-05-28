@extends('back.layouts.master')
@section('title','Settings')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
          <h5>@yield('title')</h5>
      </h6>
    </div>
    <div class="card-body">
       @if($errors->any())
          <div class="alert alert-danger">
             @foreach($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
          </div>
        @endif
       <div class="row">
           <div class="col-md-6">
              <img src="{{asset('/').$settings->logo}}" alt="" style="width:200px;height:100px;object-fit:cover;">
           </div>
           <div class="col-md-6">
              <img src="{{asset('/').$settings->favicon}}" alt="" style="width:200px;height:100px;object-fit:cover;">
           </div>
       </div><br>
       <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
        @csrf
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Site Title</label>
                    <input type="text" name="title" value="{{$settings->title}}" class="form-control" placeholder="Enter site title">
                 </div> 
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Site Status</label>
                    <select name="status" class="form-control">
                      @if($settings->status == 0)
                         <option value="0" selected>Passive</option>
                         <option value="1">Active</option>
                         @else
                         <option value="0">Passive</option>
                         <option value="1" selected>Active</option>
                      @endif
                    </select>
                 </div> 
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Site Logo</label>
                    <input type="file" class="form-control" name="logo">
                 </div> 
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Site Favicon</label>
                    <input type="file" class="form-control" name="favicon">
                 </div> 
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                 </div> 
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Twitter</label>
                    <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}">
                 </div> 
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Github</label>
                    <input type="text" class="form-control" name="github" value="{{$settings->github}}">
                 </div> 
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Linkedin</label>
                    <input type="text" class="form-control" name="linkedin" value="{{$settings->linkedin}}">
                 </div> 
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" class="form-control" name="youtube" value="{{$settings->youtube}}">
                 </div> 
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}">
                 </div> 
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <button type="submit" class="btn btn-success float-right">Update</button>
                </div>
              </div>
           </div>
       </form>
    </div>
  </div>
@endsection
