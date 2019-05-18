@extends('layouts.app')

@section('content')

@include('admin.include.errors')


<div class="text-center"><h2>Create New Tag</h2></div>
<div class="container">
<div class="panel panel-default">

<div class="panel-heading">


<div class="panel-body">
<form action="{{ route('tags.store')}}" method="post" >


{{ csrf_field()}}


<div class="form-group">
  <label for="name">Tag Name
   </label>
   <input type="text" name="tag" class="form-control">
</div>



   
<div class="form-group">

   <div class="text-center">
   
     <button class="btn btn-success" type="submit">
       Store Tag
     </button>
   </div>
 </div>
</form>


</div>

</div>
</div>
</div>


@endsection