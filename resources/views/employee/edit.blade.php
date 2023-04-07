@extends('admin.master')

@section('body')

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <a type="button" class="btn btn-primary" href="{{route('employee.manage')}}">Cancel Update</a>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Employee form</h4>
                    <form class="form-horizontal" action="{{ route('employee.update',$employee->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" value="{{$employee->name}}" placeholder="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Department</label>
                            <div class="col-9">
                                <select name="department_id" class="form-select" id="example-select">
                                    <option value="{{ $employee->department_id }}">{{ $employee->hasDepartment->name }}</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Designation</label>
                            <div class="col-9">
                                <select name="designation_id" class="form-select" id="example-select">
                                    <option value="{{ $employee->designation_id }}">{{ $employee->hasDesignation->name }}</option>
                                    @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Code</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="code" value="{{$employee->code}}" placeholder="code">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="address" value="{{$employee->address}}" placeholder="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" value="{{$employee->email}}" placeholder="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset($employee->image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="mobile" value="{{$employee->mobile}}" placeholder="mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">NID </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nid" value="{{$employee->nid}}" placeholder="support number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Blood Group</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="blood_group" value="{{$employee->blood_group}}" placeholder="social address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Date of Birth</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="date_of_birth" value="{{$employee->date_of_birth}}" placeholder="social address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Joining Date</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="joining_date" value="{{$employee->joining_date}}" placeholder="social address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Employee type</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="employee_type" value="{{$employee->employee_type}}" placeholder="social address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Basic salary</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="basic_salary" value="{{$employee->basic_salary}}" placeholder="social address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Status</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="status" value="{{ $employee->status }}" placeholder="basic salary">
                                <select name="status" class="form-select" id="example-select">
                                    <option selected disabled>Please select status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update Employee Info</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
