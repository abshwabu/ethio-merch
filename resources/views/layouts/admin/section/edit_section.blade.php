@extends('layouts.admin.admin_layout')
@section('content')
@section('title','Edit section')
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ route('section') }}">Sections</a></li>
@endsection
@section('breadcrumb-active','Edit section')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit section</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
               
              <form method="POST" role="form" class="text-start"  action="{{ url('admin/section_update/'.$section->id) }}" enctype="multipart/form-data">
                                                           @csrf
                <div class="my-3 col-md-6 mx-auto">
                  <label>name</label>
                  <input type="text " class="form-control @error('name') is-invalid @enderror" value="{{$section->name}}" name="name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="my-3 col-md-6 mx-auto">
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" {{ $section->status=='1'? 'checked':'' }}>
                      <label class="custom-control-label" for="customSwitch1">status</label>
                    </div>
                  </div>
                  
                </div>
                <div class="my-3 col-md-6 mx-auto">
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">update</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
  @endsection