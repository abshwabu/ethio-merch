<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-defualt">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add new product
                        </div>
                        <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All products</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" enctyp="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product slug</label>
                            <div class="col-md-4">
                                <input type="text" class="input-md form-control" placeholder="Product Slug" wire:model="slug" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Short Description" wire:model="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Regular Price" wire:model="regular_price"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Sale Price" wire:model="sale_price"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="SKU" wire:model="SKU"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Stock Status</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" wire:model="featured">Featured</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="o">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Quantity" wire:model="quantity"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-4">
                                <input type="file"  class="input-file" wire:model="image" />
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Catagory</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="catagory_id">
                                    <option value="">Select Catagory</option>
                                    @foreach($catagories as $catagory)
                                    <option value="{{$catagory->id}}">{{$catagory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
