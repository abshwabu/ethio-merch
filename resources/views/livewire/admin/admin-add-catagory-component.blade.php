<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <div class="col-md-6">
                            Add New Catagory
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.catagories')}}" class="btn btn-success pull-right">All Catagories</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success " role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="storeCatagory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Catagory Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="catagory Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Catagory slug</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="catagory Name" class="form-control input-md" wire:model="slug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                           
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
