@extends('layouts.admin.admin_layout')
@section('content')
@section('title','Catalogues')
@section('breadcrumb-active','Categories')
@if (Session::has('success'))
<script>
$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });


    Toast.fire({
      icon: 'success',
      title: "{{ Session::get('success') }}"
    });
  
});
</script>
@endif
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>
            <a href="{{ url('admin/add-edit-category') }}" class="btn btn-success float-right">add category</a>    

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="categories" style="overflow-x: auto;" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>category name</th>
                <th>parent category</th>
                <th>section</th>
                <th>slug</th>
                <th>status</th>
                <th>action</th>
               
              </tr>
              </thead>
              <tbody>
                @foreach ($category as $item)
                @if (!isset($item->parentcategory->cate_name))
                  <?php $parent= "Root";?>
                @else
                  <?php $parent= $item->parentcategory->cate_name?>
                @endif
             
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->cate_name }}</td>
                <td>{{ $parent }}</td>
                <td>{{ $item->section->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>
                  <a href="javascript:void(0)" class="updateCategoryStatus" id="cate-{{ $item->id }}" cate_id="{{ $item->id }}">
                    <span class="{{ $item->status == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{ $item->status == 1 ? 'active' : 'inactive' }}</span>
                    </a>
                </td>
                <td>
                  <a href="{{ url('admin/add-edit-category/'.$item->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit category">
                    <i class="fas fa-edit text-primary text-sm " data-bs-toggle="tooltip" data-bs-placement="top" title="edit category"></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" record="category" recordId="{{ $item->id }}"  class="confirm_delete" >
                    <i class="fas fa-trash text-primary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="delete category" ></i>
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
</section>
@endsection
