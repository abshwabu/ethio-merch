@extends('layouts.admin.admin_layout')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Admins</h3>
            <a href="{{ route('admin-details') }}" class="btn btn-success float-right">Contacts</a>   
          </div>
          <div class="card-body">
            <table id="admins" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>pic</th>
                <th>title</th>
                <th>full name</th>
                <th>email</th>
                <th>type</th>
                <th>status</th>
               
              </tr>
              </thead>
              <tbody>
              @foreach ($user as $admin)
                
             
              <tr>
                <td>{{ $admin->id }}</td>
                <td>
                  @if (!empty($admin->profile_picture) && file_exists('storage/'.$admin->profile_picture))
              
                  <img src="{{ asset('storage/'.$admin->profile_picture) }}" alt="profile_image" style="width:50px" class="user-image img-circle">
                  @else
                  <img src="{{ asset('assets/imgs/admin_imgs/avatar.jpg') }}" alt="profile_image" style="width:50px" class=" border-radius-lg shadow-sm">
                  @endif
                </td>
                <td>{{ $admin->title}}</td>
                <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                <td>{{ $admin->user->email }}</td>
                <td>
                    <span class="{{ $admin->is_super == 1 ? 'badge badge-sm bg-gradient-primary' : 'badge badge-sm bg-gradient-secondary'}} ">{{ $admin->is_super == 1 ? 'super admin' : 'admin' }}</span>
                </td>
                <td>
                    <span class="{{ $admin->user->status == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{ $admin->user->status == 1 ? 'active' : 'inactive' }}</span>
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


