@extends('layouts.admin.admin_layout')
@section('content')
@section('title',$title)
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
@endsection
@section('breadcrumb-active','images')
@if (Session::has('success'))
<script>
    $(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
  });


    Toast.fire({
      icon: 'success',
      title: "{{ Session::get('success') }}"
    });
  
});
</script>
@elseif (Session::has('error'))
<script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
      });
    
    
        Toast.fire({
          icon: 'error',
          title: "{{ Session::get('error') }}"
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
                        <h3 class="card-title">{{ $title }}</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>product name : </label>&nbsp; @if (!empty($product['product_name'])) {{
                                        $product['product_name'] }} @endif

                                    </div>



                                    <div class="form-group">
                                        <label>product code : </label>&nbsp; @if (!empty($product['product_code'])) {{
                                        $product['product_code'] }} @endif

                                    </div>
                                    <div class="form-group">
                                        <label>product color : </label>&nbsp; @if (!empty($product['product_color']))
                                        {{
                                        $product['product_color'] }} @endif

                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        @if (!empty($product['product_image']) &&
                                        file_exists("storage/".$product['product_image']))

                                        <img src="/storage/{{ $product['product_image'] }}"
                                            alt="{{ $product['product_name'] }} image" style="width: 150px">
                                        @else
                                        <img src="{{ asset('storage/products/small/no_image.png')}}" alt="no_image"
                                            style="width: 150px">
                                        @endif
                                    </div>
                                </div>
                                <form method="POST" role="form" class="text-start"
                                    action="{{ url('admin/add-images/'.$product['id']) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Add images</label>
                                            <input  type="file" name="images[]"  multiple />
                                            
                                               
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success float-right">add image</button>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                </form>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Added product images</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="products" style="overflow-x:scroll; "
                                class="table table-bordered  table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Id</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product['images'] as $item)
                                    <input style="display: none;" type="text" name="atrrId[]" value="{{ $item['id'] }}">
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td id="">{{ $item['product_id'] }}</td>
                                        <td id="">
                                            <img src="{{ '/storage/products/small/'.$item['image'] }}" alt="no image" style="width: 150px">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="updateImageStatus"
                                                id="image-{{ $item['id'] }}" image_id="{{ $item['id'] }}">
                                                <span
                                                    class="{{ $item['status'] == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{
                                                    $item['status'] == 1 ? 'active' : 'inactive'}}</span>
                                            </a>
                                        </td>
                                        <td>


                                            &nbsp;&nbsp;&nbsp;

                                            <a href="javascript:void(0);" record="image" recordId="{{ $item['id'] }}"
                                                class="confirm_delete">
                                                <i class="fas fa-trash text-primary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="delete product"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
          
                <!-- card end -->
            </div>

        </div>
    </div>
    </div>


</section>
@endsection