@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Role Information</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Role Name</th>
                            <th>Description</th>
                            <th>Route Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                @foreach($role->roleRoutes as $roleRoute)
                                    <span class="">{{$roleRoute->route_name.', '}}  </span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('role.edit', ['id' => $role->id])}}" class="btn btn-success btn-sm" title="Edit">
                                    <i class="ri-edit-box-fill"></i>
                                </a>
                                <a href="{{route('role.delete', ['id' => $role->id])}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Ary you sure to delete this..');">
                                    <i class="ri-chat-delete-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
