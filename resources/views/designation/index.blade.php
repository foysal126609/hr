@extends('admin.master')

@section('body')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDesignation-modal">Add Designation</button>
    <div id="addDesignation-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <form class="ps-3 pe-3" action="{{ route('designation.new') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter Designation Name">
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
    @foreach($designations as $designation)
        <div id="modal-edit-des{{ $designation->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <form class="ps-3 pe-3" action="{{ route('designation.update',$designation->id) }}" method="post" id="modal-edit">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ $designation->name }}" placeholder="Enter Department Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input class="form-control" type="text" id="description" name="description" value="{{ $designation->description }}" placeholder="Enter Department Description">
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
                    <h4 class="header-title">All Designation Information</h4>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Designation Name</th>
                            <th>Designation Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($designations as $key => $designation)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$designation->name}}</td>
                                <td>{{$designation->description}}</td>

                                <td>
                                    <a data-bs-target="#modal-edit-des{{ $designation->id }}" id="modal-edit" data-bs-toggle="modal" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="{{route('designation.delete', ['id' => $designation->id])}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Ary you sure to delete this..');">
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
