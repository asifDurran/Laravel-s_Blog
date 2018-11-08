@extends('layouts.app')

@section('content')

@if(count($errors) > 0)

<ul class="list group">

 @foreach($errors->all() as $error)

  <li class="list-group-item text-danger">
  
   {{ $error  }}
  
  </li>

   @endforeach
</ul>

@endif

<div class="text-center"><h2>Create New Post</h2></div>
<div class="container">
<div class="panel panel-default">

<div class="panel-heading">


<div class="panel-body">
<form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">


{{ csrf_field()}}


<div class="form-goup">
  <label for="title">Title
   </label>
   <input type="text" name="title" class="form-control">
</div>

<div class="form-goup">
  <label for="category_id">Category ID
   </label>
   <input type="integer" name="Category_id" class="form-control">
</div>

<div class="form-goup">
  <label for="Feature">Feature
   </label>
   <input type="file" name="featured" class="form-control">
</div>

   <div class="form-goup">
  <label for="content">Content
   </label>
   <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
</div>
   
<div class="form-group">

   <div class="text-center">
   
     <button class="btn btn-success" type="submit">
       Store Post
     </button>
   </div>
 </div>
</form>


</div>

</div>
</div>
</div>


@endsection