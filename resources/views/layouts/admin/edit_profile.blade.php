@extends('layouts.admin.admin_layout')
@section('content')
@section('title',$title)
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ url('admin/profile/'.Auth::user()->id) }}">Profile</a></li>
@endsection
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
@section('breadcrumb-active',$title)

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" role="form" class="text-start" action="{{ url('admin/edit-profile/'.$admin->id) }}"
              enctype="multipart/form-data">

              @csrf
              <div class="col-sm-4 my-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" disabled class="form-control @error('title') is-invalid @enderror" name="title" @if (!empty($admin->title)) value="{{ $admin->title }}" @else value="{{ old('title') }}" @endif>
                  @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4 my-2">
                <div class="form-group">
                  <label>First name</label>
                  <input type="text " class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                    @if (!empty($admin->first_name)) value="{{ $admin->first_name }}"

                  @else value="{{ old('first_name') }}" @endif>
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4 my-2">
                <div class="form-group">
                  <label>Last name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                   @if(!empty($admin->last_name)) value="{{ $admin->last_name }}"

                  @else value="{{ old('last_name') }}" @endif>
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4 my-2">
                <div class="form-group">
                  <label>Last name</label>
                  <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                    @if (!empty($admin->phone_number)) value="{{ $admin->phone_number }}"

                  @else value="{{ old('phone_number') }}" @endif>
                  @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4 my-2">
                <div class="form-group">
                  <label>profile picture</label>
                  <div class="custom-file">
                    <input type="file" name="profile_picture"
                      class="custom-file-input form-control @error('profile_picture') is-invalid @enderror"
                      data-bs-toggle="tooltip" data-bs-placement="right" title="please use images with white bg">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('profile_picture')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
  @endsection