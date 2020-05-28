@extends('back.layouts.master')
@section('title','Admin Panel')
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Article Count</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$article->count()}}</div>
            </div>
            <div class="col-auto">
                <i class="far fa-newspaper fa-3x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Article Show Count</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hit}}</div>
            </div>
            <div class="col-auto">
                <i class="far fa-newspaper fa-3x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category Count</div>
                <div class="row no-gutters align-items-center">
                <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$category->count()}}</div>
                </div>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-list fa-3x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Page Count</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$page->count()}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-columns fa-3x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
