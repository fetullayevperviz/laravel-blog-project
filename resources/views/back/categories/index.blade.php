@extends('back.layouts.master')
@section('title','All Categories')
@section('content')
   <div class="row">
       <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.category.create')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="Enter category name"
                            required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm float-right text-white">Insert Category</button>
                        </div>
                    </form>
                </div>
            </div>
       </div>
       <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Count</th>
                        <th>Status</th>
                        <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td style="width:10%;" class="text-center">{{$category->id}}</td>
                            <td style="width:25%;">{{$category->category_name}}</td>
                            <td style="width:15%;" class="text-center">{{$category->articleCount()}}</td>
                            <td style="width:10%;" class="text-center">
                                @if($category->status == 0)
                                    <button type="button" class="btn btn-danger btn-sm text-white">Passive</button>
                                @else
                                    <button type="button" class="btn btn-success btn-sm text-white">Active</button>
                                @endif
                            </td>
                            <td style="width:40%;" class="text-center">
                                <a category_id="{{$category->id}}" style="cursor:pointer;" class="btn btn-primary btn-sm text-white editCategory" title="Edit Category">
                                <i class="fa fa-edit"></i>&nbsp; Edit</a>  
                                <a category_id="{{$category->id}}" categoryName="{{$category->category_name}}" categoryCount="{{$category->articleCount()}}" class="btn btn-danger btn-sm text-white deleteCategory" style="cursor:pointer;" title="Delete Category">
                                   <i class="fa fa-trash"></i>&nbsp; Delete
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
       </div>
   </div>

<!-- Modal -->
<div id="editCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit Category</h6>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.category.update')}}" method="post">
         @csrf
         <div class="form-group">
           <label>Category Name</label>
           <input type="text" name="category_name" id="category_name" class="form-control">
           <input type="hidden" name="id" id="category_id">
         </div>
         <div class="form-group">
           <label>Status</label>
           <select name="status" id="status" class="form-control">
              <option value="0">Passive</option>
              <option value="1">Active</option>
           </select>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" id="updateCategory" class="btn btn-success btn-sm float-right">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="deleteCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Delete Category</h6>
      </div>
      <div class="modal-body" id="modalBody">
        <div id="articleAlert" class="alert alert-danger">
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
        <form action="{{route('admin.category.delete')}}" method="post">
            @csrf
           <input type="hidden" name="id" id="delete_id">
           <button type="submit" id="deleteCategory" class="btn btn-danger btn-sm float-right">Delete</button>
        </form>
      </form>
    </div>
  </div>
</div>

@endsection
































