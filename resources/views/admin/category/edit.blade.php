@extends('layouts.app')

@section('content')

@include('admin.include.errors')


<div class="container">
<div class="panel panel-default">

<div class="panel-heading">
 Update Category:: {{ $category->name}}
<div class="panel-body">
<form action="{{ route('categories.update', ['id'=>$category->id]) }}" method="post" >

{{csrf_field() }}
{{ method_field('PUT')}} 


<div class="form-group">
  <label for="name">Category Name
   </label>
   <input type="text" name="name" value="{{$category->name}}" class="form-control">
</div>



   
<div class="form-group">

   <div class="text-center">
   
     <button class="btn btn-success" type="submit" >
       Update category
     </button>
   </div>
 </div>
</form>


</div>
</div>
</div>
</div>

@endsection