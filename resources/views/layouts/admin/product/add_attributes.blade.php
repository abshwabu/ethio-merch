@extends('layouts.admin.admin_layout')
@section('content')
@section('title',$title)
@section('breadcrumb-item')
<li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
@endsection
@section('breadcrumb-active','attributes')
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
                                        file_exists("storage/products/large/".$product['product_image']))

                                        <img src="/storage/products/large/{{ $product['product_image'] }}"
                                            alt="{{ $product['product_name'] }} image" style="width: 150px">
                                        @else
                                        <img src="{{ asset('storage/products/small/no_image.png')}}" alt="no_image"
                                            style="width: 150px">
                                        @endif
                                    </div>
                                </div>
                                <form method="POST" role="form" class="text-start"
                                    action="{{ url('admin/add-attributes/'.$product['id']) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="field_wrapper">
                                            <input id="size" type="text" name="size[]" value="" placeholder="Size"
                                                style="width:100px;" required />
                                            <input id="SKU" type="text" name="SKU[]" value="" placeholder="SKU"
                                                style="width:100px;" required />
                                            <input id="price" type="number" name="price[]" value="" placeholder="Price"
                                                style="width:100px;" required />
                                            <input id="stock" type="number" name="stock[]" value="" placeholder="Stock"
                                                style="width:100px;" required />
                                            <a href="javascript:void(0);" class="add_button" title="Add field"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>




                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success float-right">add attribute</button>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                </form>



                <form action="{{ url('admin/edit-attributes/'.$product['id']) }}" method="post" role="form">
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Added product attributes</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="products" style="overflow-x:auto; display:block"  class="table table-bordered  table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Size</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product['attributes'] as $item)
                                <input style="display: none;" type="text" name="atrrId[]" value="{{ $item['id'] }}">
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td id="table_size">{{ $item['size'] }}</td>
                                    <td id="table_SKU">{{ $item['SKU'] }}</td>
                                    <td>
                                        <input type="number" name="price[]" value="{{ $item['price'] }}">
                                    </td>
                                    <td>
                                        <input type="number" name="stock[]" value="{{ $item['stock'] }}">
                                    </td>


                                    <td>
                                        <a href="javascript:void(0)" class="updateAttributeStatus"
                                            id="attribute-{{ $item['id'] }}" attribute_id="{{ $item['id'] }}">
                                            <span
                                                class="{{ $item['status'] == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{
                                                $item['status'] == 1 ? 'active' : 'inactive'}}</span>
                                        </a>
                                    </td>
                                    <td>

                                        
                                        &nbsp;&nbsp;&nbsp;

                                        <a href="javascript:void(0);" record="attribute" recordId="{{ $item['id'] }}"  class="confirm_delete" >
                                            <i class="fas fa-trash text-primary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="delete product" ></i>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">update attribute</button>
                    </div>
                </div>
            </form>
                <!-- card end -->
            </div>

        </div>
    </div>
    </div>


</section>
@endsection