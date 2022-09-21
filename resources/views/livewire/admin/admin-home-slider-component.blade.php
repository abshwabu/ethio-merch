<div>
<style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All slides
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>price</th>
                                <th>link</th>
                                <th>status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                        @endif
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}} </td>
                                <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="60" alt="{{$slider->title}}"> </td>
                                <td>{{$slider->title}} </td>
                                <td>{{$slider->subtitle}} </td>
                                <td>{{$slider->price}} </td>
                                <td>{{$slider->link}} </td>
                                <td>{{$slider->status}} </td>
                                <td>{{$slider->created_at}} </td>
                                <td> 
                                <a href="{{route('admin.edithomeslider',['slider_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})" ><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
