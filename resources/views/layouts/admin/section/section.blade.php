@extends('layouts.admin.admin_layout')
@section('content')
@section('title','Catalogues')
@section('breadcrumb-active','Sections')
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
      title: 'section updated'
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
            <h3 class="card-title">Sections</h3>
        
          </div>
          <div class="card-body">
            <table id="sections" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>section name</th>
                <th>status</th>
                <th>action</th>
               
              </tr>
              </thead>
              <tbody>
              @foreach ($section as $item)
                
             
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                  <a class="updateSectionStatus" href="javascript:void(0)" section_id="{{ $item->id }}" id="section-{{ $item->id }}">
                    <span class="{{ $item->status == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{ $item->status == 1 ? 'active' : 'inactive' }}</span>
                   </a>
                </td>
                <td>
                  <a href="{{ url('admin/edit_section/'.$item->id) }}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit section">
                    <i class="fas fa-user-edit text-primary text-sm " data-bs-toggle="tooltip" data-bs-placement="top" title="edit section"></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" record="section" recordId="{{ $item->id }}"  class="confirm_delete" >
                    <i class="fas fa-trash text-primary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="delete section" ></i>
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
