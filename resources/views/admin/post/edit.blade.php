@extends('layouts.app')

@section('content')

@include('admin.include.errors')

<div class="container">
<div class="panel panel-default">

<div class="panel-heading">

 Edit Post : {{$post->title}}
<div class="panel-body">
<form action="{{ route('posts.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">

{{ csrf_field()}}
{{ method_field('PUT')}} 



<div class="form-group">
  <label for="title">Title
   </label>
   <input type="text" name="title" value="{{ $post->title }}" class="form-control">
</div>

<div class="form-group">

<label for="Category">Select a Category</label>

<div class="select form-group">

    <select name="category_id" id="category" class="form-control">

          @foreach($category as $category)

          <option value="{{$category->id}}"
          
          @if($post->category->id == $category->id )

            Selected
          @endif
          >{{$category->name}}</option>

          @endforeach

    </select>

</div>


</div>

    <div class="form-group">
      <label for="Feature">Featured
      </label>
      <input type="file" name="featured" class="form-control">
    </div>

    <div class="form-group">
              <label for="">Select Tags</label>
                      @foreach($tag as $tag)
                    
                        <div class="form-check">
                          
                            <label><input  type="checkbox" name="tags[]" value="{{ $tag->id}}"
                             
                                @foreach($post->tags as $t)
                                
                                    @if($tag->id == $t->id)
                                      
                                      checked 
                                    
                                    @endif

                                @endforeach
                            
                            >{{ $tag->tag}}</label>
                                
                            </div>
                          
                    @endforeach
                    </div>


    <div class="form-group">
      <label for="content">Content
      </label>
      <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content}}</textarea>
    </div>
   
    <div class="form-group">

      <div class="text-center">
      
        <button class="btn btn-success" type="submit">
          Update Post!
        </button>
      </div>
    </div>
</form>


</div>

</div>
</div>
</div>


@endsection