@extends('layouts.template')
@section('content')
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Enter your first name" value="{{Auth::user()->name}}">
                            </div>
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="role">Role</label>
                                <input class="form-control" name="role" type="text" placeholder="Your Role" value="{{Auth::user()->role}}">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{Auth::user()->email}}">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone Number</label>
                                <input class="form-control" name="phone" type="text" placeholder="Enter your phone number" value="{{Auth::user()->phone}}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="alamat">Address</label>
                            <input class="form-control" name="alamat" type="text" placeholder="Enter your location" value="{{Auth::user()->alamat}}">
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection