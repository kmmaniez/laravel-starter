@extends('layouts.master')

@section('konten')
    
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3">
    
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Photo Profile</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('sb-admin/img/user_profile.jpg') }}" class="img-fluid img-thumbnail" alt="...">
                    </div>
                </div>
    
            </div>
            
            <div class="col-lg-9">
    
                <!-- Profile information -->
                <div class="card shadow mb-4">
                    <a href="#profileinfo" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="profileinfo">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                    </a>
                    <div class="collapse show" id="profileinfo">
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" name="address" id="address" class="form-control" rows="3">{{ Auth::user()->created_at }}</textarea>
                                </div>
                                <button class="btn btn-md btn-primary">Update profile</button>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- Change password -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#changepassword" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="changepassword">
                        <h6 class="m-0 font-weight-bold text-primary">Security</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="changepassword">
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="text" name="current_password" id="current_password" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="text" name="password" id="password" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                <button class="btn btn-md btn-primary">Update password</button>
                            </form>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>

    </div>

@endsection