@extends('layouts.admin.admin_layout')
@section('content')
<div class="page-header align-items-start min-vh-100">
  <span class="mask bg-gradient-dark opacity-6"></span>
  <div class="container my-auto   py-4">
    <div class="row">
      <div class=" col-12 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom py-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">new category
              </h4>

            </div>
          </div>
          <div class="card-body">

            <form method="POST" role="form" class="text-start"
              action="{{ route('new_category') }}" enctype="multipart/form-data">
              @csrf
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ">
                    
                    <label class="form-check-label">name</label>
                    <input type="text " class="form-control @error('cate_name') is-invalid @enderror" name="cate_name" value="{{ old('cate_name') }}">
                    @error('cate_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label class="form-check-label">Select section</label>
                    <select name="section_id" id="section_id" class="form-select select2" style="width: 100%" required>
                        <option value="" disabled selected >Select</option>
                        @foreach ($getSection as $section)
                          <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-6">
                  <div id="appendCategoriesLevel">
                  @include('admin.category.append_categories_level')
                </div>
                  </div>
                  <div class="col-md-6">
                    
                    <label class="form-check-label">discount</label>
                    <input type="number" class="form-control @error('cate_discount') is-invalid @enderror" name="cate_discount">
                    @error('cate_discount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                    
                    <label class="form-check-label">slug</label>
                    <input type="text " class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-floating  col-6">
                    
                    <input type="file" name="cate_img" class="form-control @error('cate_img') is-invalid @enderror" id="img"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="please use images with white bg" value="{{ old('cate_img') }}">
                    <label for="img">Category Image</label>
                    @error('cate_img')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                      
                    <label class="form-check-label">category description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" col="5" row="5" >{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">

                    <label class="form-check-label">meta_title</label>
                    <textarea class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}"></textarea>
                    @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-check-label">meta_keyword</label>
                    <div class="input-group">
                    <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" value="{{ old('meta_keyword') }}"></textarea>
                    @error('meta_keyword')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                     </div>
                  </div>
                  
                  <div class="col-md-6">

                    <label class="form-check-label">meta_desc</label>
                    <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc" value="{{ old('meta_desc') }}"></textarea>
                    @error('meta_desc')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                
                 
                </div>
              </div>

            </div>
            <div class="card-footer">
              <div class="col-md-6">
                <button type="submit" class="btn btn-success float-end">submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection