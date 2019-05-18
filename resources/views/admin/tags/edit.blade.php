@extends('layouts.app')

@section('content')

@include('admin.include.errors')


<div class="container">
<div class="panel panel-default">

<div class="panel-heading">
 Update Tags:: {{ $tag->name}}
<div class="panel-body">
<form action="{{ route('tags.update', ['id'=>$tag->id]) }}" method="post" >

{{csrf_field() }}
{{ method_field('PUT')}} 


<div class="form-group">
  <label for="name">Tag Name
   </label>
   <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
</div>



   
<div class="form-group">

   <div class="text-center">
   
     <button class="btn btn-success" type="submit" >
       Update Tag
     </button>
   </div>
 </div>
</form>


</div>
</div>
</div>
</div>

@endsection