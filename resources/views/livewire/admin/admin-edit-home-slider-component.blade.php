<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-defualt">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Slider
                        </div>
                    <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All Sliders</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" enctyp="multipart/form-data" wire:submit.prevent="updateSlider">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Title" wire:model="title" />
                            </div>
                        </div>

                        

                        

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Subtitle</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Subtitle" wire:model="subtitle"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="Price" wire:model="price"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">link</label>
                            <div class="col-md-4">
                                <input type="text"  class="input-md form-control" placeholder="link" wire:model="link"/>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" wire:model="status">status</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="o">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Slider Image</label>
                            <div class="col-md-4">
                                <input type="file"  class="input-file" wire:model="newimage" />
                                @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" alt="" width="120">
                                @else
                                    <img src="{{asset('assets/images/sliders')}}/{{$image}}" alt="">
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
