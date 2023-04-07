@extends('admin.master')

@section('body')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <a href="{{route('employee.add')}}" class="btn btn-outline-info">Add Employee</a>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Employee Information</h4>
                    <table id="datatable-buttons"  class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Department</th>
                            <th>Designation</th>
{{--                            <th>Code</th>--}}
{{--                            <th>NID</th>--}}
{{--                            <th>Address</th>--}}
                            <th>Blood Group</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
{{--                            <th>Type</th>--}}
                            <th>Joining date</th>
                            <th>Basic Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->name}}</td>
                                <td>
                                    <img src="{{ asset($employee->image) }}" class="img-fluid" alt="">
                                </td>
                                <td>{{$employee->hasDepartment->name}}</td>
                                <td>{{$employee->hasDesignation->name}}</td>
{{--                                <td>{{$employee->code}}</td>--}}
{{--                                <td>{{$employee->nid}}</td>--}}
{{--                                <td>{{$employee->address}}</td>--}}
                                <td>{{$employee->blood_group}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->date_of_birth}}</td>
{{--                                <td>{{$employee->employee_type}}</td>--}}
                                <td>{{$employee->joining_date}}</td>
                                <td>{{$employee->basic_salary}}</td>
                                <td>{{$employee->status}}</td>

                                <td>
                                    <a href="{{route('employee.edit', ['id' => $employee->id])}}" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="{{route('employee.delete', ['id' => $employee->id])}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Ary you sure to delete this..');">
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
