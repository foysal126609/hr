@extends('admin.master')

@section('body')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Employee form</h4>
                    <form class="form-horizontal" action="{{ route('employee.new') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" placeholder="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Department</label>
                            <div class="col-9">
                                <select name="department_id" class="form-select" id="example-select">
                                    <option selected>-Select-</option>
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
                                    <option selected>-Select-</option>
                                    @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Code</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="code" placeholder="code">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="image" placeholder="image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">NID</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nid" placeholder="nid">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Blood Group</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="blood_group" placeholder="blood group">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="mobile" placeholder="mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Date of birth</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="date_of_birth" placeholder="date_of_birth">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Joining Date</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="joining_date" placeholder="joining date">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Employee Type</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="employee_type" placeholder="employee type">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Basic Salary</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="basic_salary" placeholder="basic salary">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Status</label>
                            <div class="col-9">
                                <select name="status" class="form-select" id="example-select">
                                    <option selected>-Select Status-</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create Employee</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
