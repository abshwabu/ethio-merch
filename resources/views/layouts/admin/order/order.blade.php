@extends('layouts.admin.admin_layout')
@section('content')
@if (Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>
            <a href="{{ route('add_category') }}" class="btn btn-success float-right">add category</a>    

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="categories" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Full name</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Total pyament</th>
                <th>status</th>
                <th>action</th>
               
              </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->fname }}{{ $order->lname }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->total_payment }}</td>
               
                <td>
                  <a href="javascript:void(0)" class="updateCategoryStatus" id="cate-{{ $order->id }}" cate_id="{{ $order->id }}">
                    <span class="{{ $order->status == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{ $order->status == 1 ? 'active' : 'inactive' }}</span>
                    </a>
                </td>
                <td>
                 <a href="#"><i class="fa fa-eye"></i></a>
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
</section>
@endsection
