@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Role form</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('role.update', ['id' => $role->id])}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-3 col-form-label">Role Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$role->name}}" name="name" id="inputEmail3" placeholder="Role Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Description</label>
                            <div class="col-9">
                                <textarea class="form-control" id="inputPassword3" name="description" placeholder="Role Description">{{$role->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <label class="col-3 col-form-label">Select Route</label>
                            <div class="col-9">
                                @foreach($routeLists as $key => $routeList)
                                    @if($routeList->getName() != 'livewire.preview-file' && $routeList->getName() != 'livewire.upload-file' && $routeList->getName() != 'livewire.message' && $routeList->getName() != 'profile.show' && $routeList->getName() != 'two-factor.recovery-codes' && $routeList->getName() != 'two-factor.secret-key' && $routeList->getName() != 'two-factor.qr-code' && $routeList->getName() != 'two-factor.disable' &&  $routeList->getName() != 'two-factor.confirm' && $routeList->getName() != 'two-factor.enable' && $routeList->getName() != 'two-factor.login' && $routeList->getName() != 'password.confirm' && $routeList->getName() != 'password.confirmation' && $routeList->getName() != 'user-password.update' && $routeList->getName() != 'user-profile-information.update' && $routeList->getName() != 'register' && $routeList->getName() != 'password.update' && $routeList->getName() != 'password.email' && $routeList->getName() != 'password.reset' && $routeList->getName() != 'password.request' && $routeList->getName() != 'ignition.executeSolution' && $routeList->getName() != 'ignition.updateConfig' && $routeList->getName() != 'ignition.healthCheck' && $routeList->getName() != 'sanctum.csrf-cookie' && $routeList->getName() != null && $routeList->getName() != 'logout' && $routeList->getName() != 'login' && $routeList->getName() != 'home')
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" value="{{ $routeList->getName() }}" @foreach($role->roleRoutes as $roleRoute) {{ $routeList->getName() == $roleRoute->route_name ? 'checked' : '' }} @endforeach name="route_name[]" class="form-check-input" id="customCheck{{$key}}"/>
                                            <label class="form-check-label" for="customCheck{{$key}}">{{ $routeList->getName() }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update Role Info</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
