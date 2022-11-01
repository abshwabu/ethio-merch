@extends('layouts.admin.admin_layout')
@section('title',$title)
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ route('category') }}">Categories</a></li>
@endsection
@section('breadcrumb-active',$title)
@section('content')
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
            <form method="POST" role="form" class="text-start" @if (empty($categoryData))
              action="{{ url('admin/add-edit-category') }}" @else
              action="{{ url('admin/add-edit-category/'.$categoryData->id) }}" @endif enctype="multipart/form-data">
              @csrf
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6 my-2 ">

                    <div class="form-group">
                      <label>name</label>
                      <input type="text " class="form-control @error('cate_name') is-invalid @enderror" name="cate_name"
                        @if (!empty($categoryData->cate_name)) value="{{ $categoryData->cate_name }}"

                      @else value="{{ old('cate_name') }}" @endif>
                      @error('cate_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>Select section</label>
                      <select name="section_id" id="section_id" class="form-control select2" style="width: 100%"
                        required>
                        <option disabled selected>Select</option>
                        @foreach ($getSection as $section)
                        <option value="{{ $section->id }}" @if(!empty($categoryData->section_id) &&
                          $categoryData->section_id==$section->id) selected @elseif(!empty(@old('section_id')) && @old('section_id')==$section->id) selected @endif>{{ $section->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('section_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 my-2" id="appendCategoriesLevel">
                    <div class="form-group">
                      @include('admin.category.append_categories_level')
                    </div>
                    @error('parent_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 my-2">

                    <label>discount(%)</label>
                    <div class="form-group">
                  
                      <input type="text" class="form-control @error('cate_discount') is-invalid @enderror"
                        name="cate_discount" @if (!empty($categoryData->cate_discount)) value="{{$categoryData->cate_discount }}"  @else value="0" @endif>
                     
                      @error('cate_discount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 my-2 form-group">

                    <label>slug</label>
                    <input type="text " class="form-control @error('slug') is-invalid @enderror" name="slug" @if (!empty($categoryData->slug)) value="{{ $categoryData->slug }}"

                    @else value="{{ old('slug') }}" @endif>
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 my-2">
                    <label>Category image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="cate_image"
                          class="custom-file-input form-control @error('cate_image') is-invalid @enderror" id="img"
                          data-bs-toggle="tooltip" data-bs-placement="right" title="please use images with white bg">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      @error('cate_image')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 my-2 form-group">

                    <label>category description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" col="5"
                      row="5">@if (!empty($categoryData->description)) {{ $categoryData->description }}

                        @else {{ old('description') }} @endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col-md-6 my-2 form-group">

                    <label>meta_title</label>
                    <textarea class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                        @if (!empty($categoryData->meta_title)) {{ $categoryData->meta_title }}

                        @else {{ old('meta_title') }} @endif
                      </textarea>
                    @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 my-2 form-group">
                    <label>meta_keyword</label>
                    <div class="input-group">
                      <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">
                          @if (!empty($categoryData->meta_keyword)) {{ $categoryData->meta_keyword }}

                          @else {{ old('meta_keyword') }} @endif
                        </textarea>
                      @error('meta_keyword')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6 my-2 form-group">

                    <label>meta_desc</label>
                    <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">
                        @if (!empty($categoryData->meta_desc)) {{ $categoryData->meta_desc }}

                        @else {{ old('meta_desc') }} @endif
                      </textarea>
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
            <div class="my-2">
              <button type="submit" class="btn btn-success float-right">submit</button>
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