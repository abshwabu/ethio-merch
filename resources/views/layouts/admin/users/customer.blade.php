@extends('layouts.admin.admin_layout')
@section('content')
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
      title: 'section updated'
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
                        <h3 class="card-title">Creators</h3>
                        {{-- <a href="{{ route('add_creator') }}" class="btn btn-success float-right">add creator</a>
                        --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="creators" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>user name</th>
                                    <th>email</th>
                                    <th>media</th>
                                    <th>status</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $creator)


                                <tr>
                                    <td>{{ $creator->id}}</td>
                                    <td>{{ $creator->name }}</td>
                                    <td>{{ $creator->email }}</td>
                                    <td>
                                        <a class="updateUsertatus" href="javascript:void(0)"
                                            section_id="{{ $creator->id }}" id="section-{{ $creator->id }}">
                                            <span
                                                class="{{ $creator->status == 1 ? 'badge badge-sm bg-gradient-success' : 'badge badge-sm bg-gradient-secondary'}} ">{{
                                                $creator->status == 1 ? 'active' : 'inactive' }}</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/edit_section/'.$creator->id) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit section">
                                            <i class="fas fa-user-edit text-secondary text-sm " data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="edit section"></i>
                                        </a>
                                        <form action="{{ url('admin/delete_section/'.$creator->id) }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" style=" background: none;padding: 0px; border: none"
                                                class="confirm_section_delete">
                                                <i class="fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="delete section"></i>
                                            </button>
                                        </form>
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