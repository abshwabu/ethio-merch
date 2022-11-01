@extends('layouts.admin.admin_layout')
@section('title',$title)
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
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
            <form method="POST" role="form" class="text-start" @if (empty($productData)) action="{{ url('admin/add-edit-product') }}"
            @else
            action="{{ url('admin/add-edit-product/'.$productData->id) }}"
            @endif  
              enctype="multipart/form-data">
              @csrf
              <div class="container-fluid">
                <div class="row">
                 
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>Category level</label>
                      <select name="category_id" class="form-control select2 form-control @error('category_id') is-invalid @enderror" style="width: 100%;" required>
                        <option value="">Select</option>
                        @foreach ($categories as $section)
                          <optgroup label="{{ $section['name'] }}"></optgroup>
                          @foreach ($section['categories'] as $category)
                          <option value="{{ $category['id'] }}" @if (!empty(@old('category_id')) && @old('category_id')==$category['id']) selected
                          @elseif (!empty($productData->category_id) && $productData['category_id']==$category['id']) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;{{ $category['cate_name']}}</option>
                            @foreach ($category['subcategories'] as $subcategory)
                            <option value="{{ $subcategory['id'] }}" @if (!empty(@old('category_id')) && @old('category_id')==$subcategory['id']) selected 
                            @elseif (!empty($productData->category_id) && $productData['category_id']==$subcategory['id']) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subcategory['cate_name']}}</option>
                            @endforeach
                          @endforeach
                        @endforeach
                      </select>
                      @error('category_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>name</label>
                      <input type="text " class="form-control @error('product_name') is-invalid @enderror"
                        name="product_name" @if (!empty($productData->product_name)) value="{{ $productData->product_name }}"

                      @else value="{{ old('product_name') }}" @endif>
                      @error('product_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>product code</label>
                      <input type="text " class="form-control @error('product_code') is-invalid @enderror"
                        name="product_code" @if (!empty($productData->product_code)) value="{{ $productData->product_code }}"

                      @else value="{{ old('product_code') }}" @endif>
                      @error('product_code')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>product color</label>
                      <input type="text " class="form-control @error('product_color') is-invalid @enderror"
                        name="product_color" @if (!empty($productData->product_color)) value="{{ $productData->product_color }}"

                      @else value="{{ old('product_color') }}" @endif>
                      @error('product_color')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>product discount(%)</label>
                      <input type="number " class="form-control @error('product_discount') is-invalid @enderror"
                        name="product_discount" @if (!empty($productData->product_discount)) value="{{ $productData->product_discount }}"

                      @else value="0" @endif>
                      @error('product_discount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>product price</label>
                      <input type="text " class="form-control @error('product_price') is-invalid @enderror"
                        name="product_price" @if (!empty($productData->product_price)) value="{{ $productData->product_price }}"

                      @else value="{{ old('product_price') }}" @endif>
                      @error('product_price')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
              
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>fabric</label>
                      <select style="width: 100%;" type="text " class="select2 form-control @error('fabric') is-invalid @enderror"
                      name="fabric" @if (!empty($productData->fabric)) value="{{ $productData->fabric }}"
                      
                      @else value="{{ old('fabric') }}" @endif >
                      <option value="" selected>
                        select
                      </option>
                      @foreach ($fabricArray as $fabric)
                      <option value="{{ $fabric }}" @if (!empty($productData->fabric) && $productData->fabric == $fabric) selected
                        
                      @endif>{{ $fabric }}</option>
                        
                      @endforeach
                     </select>
                      @error('fabric')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>pattern</label>
                      <select style="width: 100%;" type="text " class="select2 form-control @error('pattern') is-invalid @enderror"
                        name="pattern" @if (!empty($productData->pattern)) value="{{ $productData->pattern }}"
  
                      @else value="{{ old('pattern') }}" @endif >
                      <option value="">
                          Select
                      </option>
                      @foreach ($patternArray as $pattern)
                      <option value="{{ $pattern }}"  @if (!empty($productData->pattern) && $productData->pattern == $pattern) selected
                        
                        @endif>{{ $pattern }}</option>
                        
                      @endforeach
                    
                    </select>
                      @error('pattern')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>sleeve</label>
                      <select style="width: 100%;" type="text " class="select2 form-control @error('sleeve') is-invalid @enderror"
                        name="sleeve" @if (!empty($productData->sleeve)) value="{{ $productData->sleeve }}"

                      @else value="{{ old('sleeve') }}" @endif >
                      <option value="">
                          Select
                      </option>
                      @foreach ($sleeveArray as $sleeve)
                      <option value="{{ $sleeve }}"  @if (!empty($productData->sleeve) && $productData->sleeve == $sleeve) selected
                        
                        @endif>{{ $sleeve }}</option>
                        
                      @endforeach
                    </select>
                      @error('sleeve')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>fit</label>
                      <select style="width: 100%;" type="text " class="select2 form-control @error('fit') is-invalid @enderror"
                        name="fit" @if (!empty($productData->fit)) value="{{ $productData->fit }}"

                      @else value="{{ old('fit') }}" @endif >
                          <option value="">
                            Select
                          </option>
                      @foreach ($fitArray as $fit)
                      <option value="{{ $fit }}"  @if (!empty($productData->fit) && $productData->fit == $fit) selected
                        
                        @endif>{{ $fit }}</option>
                        
                      @endforeach
                    </select>
                      @error('fit')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label>product image</label>
                      <div class="custom-file">
                        <input type="file" name="product_image"
                          class="custom-file-input form-control @error('product_image') is-invalid @enderror"
                          data-bs-toggle="tooltip" data-bs-placement="right" title="please use images with white bg">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        @error('product_image')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      @if (!empty($productData->product_image))
                      <img src="/storage/{{ $productData->product_image }}" style="width: 80px" alt="">
                    
                      
                    @endif
                    </div>
                    <div class="form-group">
                      <label>slug</label>
                      <input type="text " class="form-control @error('slug') is-invalid @enderror"
                        name="slug" @if (!empty($productData->slug)) value="{{ $productData->slug }}"
  
                      @else value="{{ old('slug') }}" @endif>
                      @error('slug')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                     
                    </div>
                    <div class="form-group my-2">
                      <?php $product_id=request()->route('id')?>
                      @if (Request::is('admin/add-edit-product/'.$product_id))
                     
                      <label> is featured </label>
                      <a href="javascript:void(0)" class="updateProductFeatured" id="product2-{{ $productData->id }}" product_id2= "{{ $productData->id }}">{{ $productData->is_featured == '1' ? 'Yes' : 'No' }}</a>
                      
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                      <div class="form-group">
                    <label>Occassion</label>
                    <select style="width: 100%;" class="select2 form-control @error('occassion') is-invalid @enderror" name="occassion" col="5"
                      row="5" @if (!empty($productData->occassion)) value="{{ $productData->occassion }}"
                          
                      @else
                       value=" {{ old('occassion') }}"
                      @endif>
                        <option value="">
                          Select
                        </option>
                      @foreach ($occassionArray as $occassion)
                      <option value="{{ $occassion }}"  @if (!empty($productData->occassion) && $productData->occassion == $occassion) selected
                        
                        @endif>{{ $occassion }}</option>
                        
                      @endforeach
                    </select>
                    @error('occassion')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                      </div>
                    <div class="form-group">
                    <label>wash care</label>
                    <textarea class="form-control @error('wash_care') is-invalid @enderror" name="wash_care" col="5"
                      row="5">@if (!empty($productData->wash_care)) {{ $productData->wash_care }} 
                          
                        @else
                          {{ old('wash_care') }}
                        @endif</textarea>
                    @error('wash_care')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  </div>

                  <div class="col-md-6 my-2">
                    <label>description</label>
                    <div class="input-group">
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description">
                          @if (!empty($productData->description))
                          {{ $productData->description }}
                        @else
                          {{ old('description') }}
                        @endif
                        </textarea>
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <label>meta_title</label>
                    <div class="input-group">
                    <textarea class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                        @if (!empty($productData->meta_title))
                          {{ $productData->meta_title }}
                        @else
                          {{ old('meta_title') }}
                        @endif
                      </textarea>
                    @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>

                  <div class="col-md-6 my-2">
                    <label>meta_keyword</label>
                    <div class="input-group">
                      <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">
                          @if (!empty($productData->meta_keyword))
                          {{ $productData->meta_keyword }}
                        @else
                          {{ old('meta_keyword') }}
                        @endif
                        </textarea>
                      @error('meta_keyword')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                    <label>meta_desc</label>
                    <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">
                        @if (!empty($productData->meta_desc))
                        {{ $productData->meta_desc }}
                      @else
                        {{ old('meta_desc') }}
                      @endif
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
{{-- //generate a hash value for images --}}
                <input type="hidden" name="image_hash_value" value="{{Str::random(60)}}">
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
</section>
@endsection