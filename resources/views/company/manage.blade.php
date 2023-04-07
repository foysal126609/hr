@extends('admin.master')

@section('body')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <a href="{{route('company.add')}}" class="btn btn-outline-info">Add Company</a>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Company Information</h4>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL </th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Slogan</th>
                            <th>Favicon</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Support email</th>
                            <th>Support number</th>
                            <th>Social address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name}}</td>
                                <td>
                                    <img src="{{ asset($company->logo) }}" class="img-fluid" alt="">
                                </td>
                                <td>{{$company->slogan}}</td>
                                <td>
                                    <img src="{{ asset($company->favicon) }}" class="img-fluid" alt="">
                                </td>
                                <td>{{$company->address}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->mobile}}</td>
                                <td>{{$company->support_email}}</td>
                                <td>{{$company->support_number}}</td>
                                <td>{{$company->social_address}}</td>

                                <td>
                                    <a href="{{route('company.edit', ['id' => $company->id])}}" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="{{route('company.delete', ['id' => $company->id])}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Ary you sure to delete this..');">
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
