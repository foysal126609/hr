@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add User form</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('user.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-3 col-form-label">User Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="User Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail31" class="col-3 col-form-label">User Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" id="inputEmail31" placeholder="User Email"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3 col-form-label">User Password</label>
                            <div class="col-9">
                                <input type="password" class="form-control" name="password" id="inputEmail32" placeholder="User Password"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail33" class="col-3 col-form-label">User Mobile</label>
                            <div class="col-9">
                                <input type="number" class="form-control" name="mobile" id="inputEmail33" placeholder="User Mobile"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail34" class="col-3 col-form-label">User Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="image" id="inputEmail34" placeholder="User Image"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">User Type</label>
                            <div class="col-9">
                                <label><input type="radio" name="user_type" value="1"/> Admin</label>
                                <label><input type="radio" name="user_type" value="2"/> Reporter</label>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <label class="col-3">Select User Role</label>
                            <div class="col-9">
                                @foreach($roles as $key => $role)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" value="{{ $role->id }}" name="role[]" class="form-check-input" id="customCheck{{$key}}"/>
                                        <label class="form-check-label" for="customCheck{{$key}}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New User</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
