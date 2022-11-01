@extends('layouts.admin.admin_layout')
@section('content')
@section('title',$title)
@section('breadcrumb-active','Admin Profile')
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
      
     <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            @if (!empty($admin->profile_picture) && file_exists('storage/'.$admin->profile_picture))
              
              <img src="{{ asset('storage/'.$admin->profile_picture) }}" alt="profile_image" style="width:100px" class="user-image img-circle">
              @else
              <img src="{{ asset('assets/imgs/admin_imgs/avatar.jpg') }}" alt="profile_image" style="width:100px" class=" border-radius-lg shadow-sm">
              @endif
             <div class="float-right"> {{ $admin->title }}</div>
          </div>
          <hr class="horizontal gray-light my-2">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0"><strong class="text-dark">user name:</strong> &nbsp; {{ $admin->user->name }}</li>
            <li class="list-group-item border-0 ps-0"><strong class="text-dark">Email:</strong> &nbsp; {{ $admin->user->email }}</li>
            <li class="list-group-item border-0 ps-0"><strong class="text-dark">Status:</strong> &nbsp; {{ $admin->user->status == 1 ? 'Active' : 'inactive' }}</li>
            
          </ul>
        </div>
      </div>
     </div>
    </div>
    <div class="row">

      <div class="col-md-6 my-4">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Profile Information</h6>
              </div>
              <div class="col-md-4 text-end">
                <a href="{{ url('admin/edit-profile/'.$admin->user->id) }}">
                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                
                <div class="d-flex align-items-start flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">First name</h6>
                  <p class="mb-0 text-xs">{{ $admin->first_name }}</p>
                </div>
                
              </li>
              <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="d-flex align-items-start flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">Last name</h6>
                  <p class="mb-0 text-xs">{{ $admin->last_name }}</p>
                </div>
                
              </li>
             
              <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                         <div class="d-flex align-items-start flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">Admin type</h6>
                  <p class="mb-0 text-xs">{{ $admin->is_super == 1 ? 'super' : 'admin'}}</p>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                         <div class="d-flex align-items-start flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">Phone number</h6>
                  <p class="mb-0 text-xs">{{ $admin->phone_number }}</p>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  {{-- <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{ $title }}</div>
          </div>
          <div class="card-body">

            <div class="avatar avatar-xl position-relative">  
              @if (!empty($admin->profile_picture) && file_exists('storage/'.$admin->profile_picture))
              
              <img src="{{ asset('storage/'.$admin->profile_picture) }}" alt="profile_image" style="width:100px" class="user-image img-circle">
              @else
              <img src="{{ asset('assets/imgs/admin_imgs/avatar.jpg') }}" alt="profile_image" style="width:100px" class=" border-radius-lg shadow-sm">
              @endif
            </div>
            <div class="card card-plain h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Profile Information</h6>
                  </div>
                  <div class="col-md-4 text-end">
                    <a href="{{ url('admin/edit-profile/'.$admin->user->id) }}">
                      <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body p-3">
                <p class="text-sm ">
                  Hi, I’m <span class="font-weight-bold">{{ $admin->user->name }}</span>, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                </p>
                <hr class="horizontal gray-light my-2">
                <ul class="list-group">
                  <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">user name:</strong> &nbsp; {{ $admin->user->name }}</li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $admin->user->email }}</li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong> &nbsp; {{ $admin->user->status == 1 ? 'Active' : 'inactive' }}</li>
                  
                </ul>
              </div>
            </div>
          </div>

        </div>
       
      </div>
    
          <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Profile detail</h6>
              </div>
              <div class="card-body p-3">
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                    
                    <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">First name</h6>
                      <p class="mb-0 text-xs">{{ $admin->first_name }}</p>
                    </div>
                    
                  </li>
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Last name</h6>
                      <p class="mb-0 text-xs">{{ $admin->last_name }}</p>
                    </div>
                    
                  </li>
                 
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                             <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Admin type</h6>
                      <p class="mb-0 text-xs">{{ $admin->is_super == 1 ? 'super' : 'admin'}}</p>
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                             <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Phone number</h6>
                      <p class="mb-0 text-xs">{{ $admin->phone_number }}</p>
                    </div>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

  @endsection