@extends('layouts.admin.admin_layout')
@section('title',$title)
@section('breadcrumb-active',$title)
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" role="form" class="text-start" action="{{ url('admin/update-password/'.Auth::user()->id) }}"
              enctype="multipart/form-data">

              @csrf
              <div class="input-group input-group-outline my-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                  placeholder="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-group input-group-outline my-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                  placeholder="confirm password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection