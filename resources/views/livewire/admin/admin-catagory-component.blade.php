<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class=" panel panel-heading">
                <div class="col-md-6">
                    All Catagory
                </div>
                <div class="col-md-6">
                    <a href="{{route('admin.addcatagories')}}" class="btn btn-success pull-right">Add New</a>
                </div>
            </div>
            <div class="panel-body">
                @if(Session::has('message'))
                 <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Catagory Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catagories as $catagory)
                        <tr>
                            <td>{{$catagory->id}}</td>
                            <td>{{$catagory->name}}</td>
                            <td>{{$catagory->slug}}</td>
                            <td>
                                <a href="{{route('admin.editcatagory',['catagory_slug'=>$catagory->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#" wire:click.prevent="deleteCatagory({{$catagory->id}})" ><i class="fa fa-times fa-2x text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$catagories->links()}}
            </div>
        </div>
    </div>
</div></div>
</div>
