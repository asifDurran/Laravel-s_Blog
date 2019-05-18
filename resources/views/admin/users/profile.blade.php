@extends('layouts.app')

@section('content')

@include('include.errors')


<div class="text-center"><h2>User Profile</h2></div>
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-heading">


            <div class="panel-body">
                <form action="{{route('profile.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" value="{{ $user->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">New Email</label>
               
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>


                    
                    <div class="form-group">
                        <label for="password">New Password</label>
               
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Upload new Avatar</label>
               
                        <input type="file" name="avatar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="text">Facebook Profile</label>
               
                        <input type="text" name="facebook"  value="{{ $user->profile->facebook}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="youtube">YouTube Profile</label>
               
                        <input type="text" name="youtube" value="{{ $user->profile->youtube}}" class="form-control">
                    </div>
                    
                    <div class="gruop">
                      <label for="about">About </label>

                      <textarea name="about" id="about"  cols="6" rows="6" class="form-control">
                      {{ $user->profile->about}}"
                      </textarea>
                    </div>
                    <div class="group">

                    <div class="text-center">

                                <button class="btn btn-success" type="submit" class="form-control">
                                Update Profile
                                </button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>


@endsection