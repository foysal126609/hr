@extends('admin.master')

@section('body')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDept-modal">Add Department</button>
    <div id="addDept-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <form class="ps-3 pe-3" action="{{ route('department.new') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter Department Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input class="form-control" type="text" id="code" name="code" placeholder="Enter Department Code">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control" type="text" id="description" name="description" placeholder="Enter Department Description">
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

{{--    Edit Department--}}
    @foreach($departments as $department)
    <div id="modal-edit-dept{{ $department->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <form class="ps-3 pe-3" action="{{ route('department.update',$department->id) }}" method="post" id="modal-edit">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ $department->name }}" placeholder="Enter Department Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input class="form-control" type="text" id="code" name="code" value="{{ $department->code }}" placeholder="Enter Department Code">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control" type="text" id="description" name="description" value="{{ $department->description }}" placeholder="Enter Department Description">
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Department Information</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Department Name</th>
                            <th>Department Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $key => $department)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->code}}</td>
                                <td>{{$department->description}}</td>

                                <td>
                                    <a data-bs-target="#modal-edit-dept{{ $department->id }}" id="modal-edit" data-bs-toggle="modal" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="{{route('department.delete', ['id' => $department->id])}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Ary you sure to delete this..');">
                                        <i class="ri-chat-delete-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
