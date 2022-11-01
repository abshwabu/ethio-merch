@extends('layouts.admin.admin_layout')
@section('content')
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-6 m-b-30 mx-auto ">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">new section</h4>
                    
                  </div>
            </div>
        </div>
    </div>
    <div class="row account-contant">
        <div class="col-6 mx-auto">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="row no-gutters">

                        <div class="col-12">
                            <div class="page-account-form">

                                <div class="p-4">
                                    <form method="POST" action="{{ route('new_section') }}">
                                        @csrf

                                        <div class="row ">
                                            <div class="col-8 mx-auto mb-4">
                                                <label for="name" class="control-label">Name</label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="col-8 mx-auto mb-4">
                                                <div class="form-check form-switch">
                                                    <label for="status" class="form-check-label">status</label>
                                                    <input id="status" type="checkbox"
                                                        class="form-check-input @error('status') is-invalid @enderror"
                                                        name="status" autocomplete="status">

                                                </div>

                                            </div>
                                            <div class="col-8 mx-auto col-sm-6 offset-md-4 mt-2">
                                                <button type="submit" class="btn btn-primary">
                                                    add
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--mail-Compose-contant-end-->
</div>
@endsection