@extends('layouts.app')

@section('content')

 
<div class="panel panel-defult">

@include('admin.session.alert')

 <div class="panel-body">
  <div class="panel-heading">Published Post</div>
    <table class="table table-hover">
            <thead>
            
                    <th>
                        Image
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Trash
                    </th>

            </thead>
        
        <tbody>
        
            @if($posts->count() >0)

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
                                <form action="{{route('posts.update',['id'=>$post->id])}}" method="post">
                                {{csrf_field()}}

                                    {{method_field('PUT')}}

                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" name="submit" class="btn btn-danger" value="Trash">
                                </form>
                            </td>
                    </tr>
                @endforeach

                @else

                    <th colspan="5" class="text center">no posts available</th>
                    @endif
                
        
        </tbody>
    
    </table>


 
 </div>


</div>
 

@endsection