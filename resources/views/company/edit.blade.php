@extends('admin.master')

@section('body')

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <i class="ri-check-line me-2"></i> {{ session('message') }}
        </div>
    @endif
    <a type="button" class="btn btn-primary" href="{{route('company.manage')}}">Cancel Update</a>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Company form</h4>
                    <form class="form-horizontal" action="{{ route('company.update',$company->id) }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-3 col-form-label">Name</label>
                            <div class="col-9">

                                <input type="text" class="form-control" name="name" value="{{$company->name}}" placeholder="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Slogan</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="slogan" value="{{$company->slogan}}" placeholder="slogan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Logo</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="logo" value="{{$company->logo}}" placeholder="logo">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Favicon</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="favicon" value="{{$company->favicon}}" placeholder="favicon">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="address" value="{{$company->address}}" placeholder="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" value="{{$company->email}}" placeholder="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Support Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="support_email" value="{{$company->support_email}}" placeholder="support Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="mobile" value="{{$company->mobile}}" placeholder="mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Support number</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="support_number" value="{{$company->support_number}}" placeholder="support number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Social address</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="social_address" value="{{$company->social_address}}" placeholder="social address">
                            </div>
                        </div>

                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update Company Info</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
