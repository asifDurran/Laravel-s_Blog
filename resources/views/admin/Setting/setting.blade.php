@extends('layouts.app')

@section('content')

@include('admin.include.errors')


<div class="text-center"><h2>Blog Setting</h2></div>
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-heading">


            <div class="panel-body">
                <form action="{{ route('settings.update')}}" method="post" >


                {{ csrf_field()}}


                    <div class="form-group">
                        <label for="name">Site Name  </label>
               
                        <input type="text" name="site_name" value="{{ $settings->site_name}}" class="form-control">
                    </div>

                    
                    <div class="form-group">
                        <label for="rmail"> Address  </label>
               
                        <input type="text" name="address" value="{{$settings->address}}"class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="rmail"> Contact Number  </label>
               
                        <input type="text" name="contact_number" value="{{$settings->contact_number}}"class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="rmail"> Contact Email  </label>
               
                        <input type="text" name="contact_email" value="{{$settings->contact_email}}"class="form-control">
                    </div>


                    <div class="form-group">

                        <div class="text-center">

                                <button class="btn btn-success" type="submit">
                                Setting Changed
                                </button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>


@endsection