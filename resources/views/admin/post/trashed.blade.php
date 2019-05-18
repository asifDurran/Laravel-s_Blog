@extends('layouts.app')

@section('content')

 
<div class="panel panel-defult">

@include('admin.session.alert')

 <div class="panel-body">
 
 <table class="table table-hover">
 <thead>
 
 <th>
     Image
  </th>
  <th>
     Title
  </th>
  <th>
     Editing Post
  </th>
  <th>
     Restore 
  </th>
  <th>
    Delete
  </th>

  </thead>
  
  <tbody>
   
      @foreach($posts as $post)

      <tr>
      <td> 
          <img src="{{ $post->featured}}" alt="{{ $post->title}}" width="50px" height="50px">
      </td>
      <td>
           {{$post->title}}
      </td>
      <td>
         <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-info">Edit</a>
      </td>
      
      <td>
         <a href="{{route('posts.trashed',['id'=>$post->id])}}" class="btn btn-trash">Trash</a>
      </td>
      <td>
      <form action="{{route('posts.update',['id'=>$post->id])}}" method="post">
         {{csrf_field()}}
  
          {{method_field('PUT')}}

          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" name="submit" class="btn btn-danger" value="Delete">
      </form>
      </td>
      </tr>
      @endforeach
   
  
  </tbody>
 
 </table>


 
 </div>


</div>
 

@endsection