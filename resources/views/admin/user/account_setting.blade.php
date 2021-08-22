@extends('layouts.dashbord_app')

@section('title')
Account Setting | Dashbord
@endsection

@section('dashbord_content')

<div class="container">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade active show">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Infomation</h4>
                </div>
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                            <img src="{{ asset('dashbord') }}/image/user_image/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}">
                        </div>
                        <div class="m-l-20 m-r-20">
                            <h5 class="m-b-5 font-size-18">Change Avatar</h5>
                            <p class="opacity-07 font-size-13 m-b-0">
                                Recommended Dimensions: <br>
                                100x100 Max fil size: 1MB
                            </p>
                            @error('image')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
                        </div>
                        <div>
                            <form method="post" action="{{ route('profile.photo') }}" enctype="multipart/form-data">
                            @csrf
                                <input type="file" name="image">
                                <button type="submit" class="btn btn-tone btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                    <hr class="m-v-25">

                    <form method="post" action="{{ route('profile.info') }}">
                     @csrf

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="Name" placeholder="Name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="userName">User Name:</label>
                                <input type="text" class="form-control" name="username" id="userName" placeholder="User Name" value="{{ Auth::user()->username }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                <input type="text" class="form-control" name="phone" id="phoneNumber" placeholder="Phone Number" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" name="dateOfBirth" id="dob" placeholder="Date of Birth" value="{{ Auth::user()->dateOfBirth }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="language">Gender</label>
                                <select id="language" class="form-control" name="gender">
                                    <option {{ (Auth::user()->gender == 'Male') ? "selected":"" }} value="Male">Male</option>
                                    <option {{ (Auth::user()->gender == 'Female') ? "selected":"" }} value="Female">Female</option>
                                    <option {{ (Auth::user()->gender == 'Others') ? "selected":"" }} value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="font-weight-semibold" for="Profession">Profession</label>
                                <input type="text" class="form-control" name="profession" id="Profession" placeholder="Profession" value="{{ Auth::user()->profession }}">
                            </div>
                            <div class="form-group col-md-1 pt-2">
                                <button type="submit" class="btn btn-tone btn-primary mt-4">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">

                    @if(session('password_error'))
                        <div class="alert alert-danger">
                            {{ session('password_error') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('change/password/post') }}">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                                <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="newPassword">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="password" placeholder="New Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary m-t-30">Change</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Address Details</h4>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ url('change/address') }}">
                            @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="fullAddress">Full Address:</label>
                                        <textarea class="form-control" name="address" id="fullAddress" rows="5">{{ Auth::user()->address }}</textarea>
                                        <button type="submit" class="btn btn-tone btn-primary mt-2">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bio</h4>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ url('change/bio') }}">
                            @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="bio">Bio:</label>
                                        <textarea class="form-control" name="bio" id="bio" rows="5">{{ Auth::user()->bio }}</textarea>
                                        <button type="submit" class="btn btn-tone btn-primary mt-2">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('footer_scripts')
  <script>

    @if(session('profile_image'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Profile image update successfully.');
    @endif

    @if(session('profile_info'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Information Updated Successfully.');
    @endif

    @if(session('password_same_error'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Old password and New password is same!');
    @endif

    @if(session('password_success'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Password changed successfully.');
    @endif

    @if(session('password_old_error'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Your old password does not match!!');
    @endif

    @if(session('address_update'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Address update successfully...');
    @endif


  </script>
@endsection
