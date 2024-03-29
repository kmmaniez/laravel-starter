@extends('layouts.master')

@section('konten')
    
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3">
    
                <!-- Photo -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Photo Profile</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/user/image/'.$user->image) }}" class="img-fluid img-thumbnail" alt="Photo profile">
                    </div>
                </div>
    
            </div>
            
            <div class="col-lg-9">
    
                <!-- Profile information -->
                <div class="card shadow mb-4">
                    <a href="#profileinfo" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="profileinfo">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Settings</h6>
                    </a>
                    <div class="collapse show" id="profileinfo">
                        <div class="card-body">
                            
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success alert-notif"><i class="fas fa-fw fa-check"></i> <strong>Profile settings saved</strong></div>
                            @endif
                            
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image" class="form-label">Photo</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <button class="btn btn-md btn-primary">Update profile</button>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- Change password -->
                <div class="card shadow mb-4">
                    <a href="#changepassword" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="changepassword">
                        <h6 class="m-0 font-weight-bold text-primary">Security Settings</h6>
                    </a>
                    <div class="collapse show" id="changepassword">
                        <div class="card-body">

                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success alert-notif"><i class="fas fa-fw fa-check"></i> <strong>Password saved</strong></div>
                            @endif

                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                                <button class="btn btn-md btn-primary" id="update_pass">Update password</button>
                            </form>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>

    </div>

@endsection