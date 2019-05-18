@extends('layouts.app')

@section('content')

@include('admin.include.errors')


<div class="text-center"><h2>Add New User</h2></div>
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-heading">


            <div class="panel-body">
                <form action="{{ route('users.store')}}" method="post" >


                {{ csrf_field()}}


                    <div class="form-group">
                        <label for="name">User Name  </label>
               
                        <input type="text" name="name" class="form-control">
                    </div>

                    
                    <div class="form-group">
                        <label for="rmail">User Email  </label>
               
                        <input type="email" name="email" class="form-control">
                    </div>


                    <div class="form-group">

                        <div class="text-center">

                                <button class="btn btn-success" type="submit">
                                Add User
                                </button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>


@endsection