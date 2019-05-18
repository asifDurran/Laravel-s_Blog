@extends('layouts.app')

@section('content')

@include('admin.include.errors')
<div class="text-center"><h2>Create New Post</h2></div>
    <div class="container">
        <div class="panel panel-default">

          <div class="panel-heading">


              <div class="panel-body">
                    <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">

                    {{ csrf_field()}}

                          <div class="form-group">
                            <label for="title">Title
                            </label>
                            <input type="text" name="title" class="form-control">
                          </div>

                          <div class="form-group">

                            <label for="Category">Select a Category</label>

                                  <div class="select form-group">

                                  <select name="category_id" id="category" class="form-control">

                                  @foreach($category as $category)

                                  <option value="{{$category->id}}">{{$category->name}}</option>

                                  @endforeach

                                  </select>

                                  </div>


                          </div>
                          <div class="form-group">
                              <label for="">Select Tags</label>
                              @foreach($tag as $tag)
                        
                                <div class="form-check">
                              
                                <label><input  type="checkbox" name="tags[]" value="{{ $tag->id}}">{{ $tag->tag}}</label>
                                    
                                </div>
                              
                                @endforeach
                              </div>


                          <div class="form-group">
                            <label for="Feature">Featured
                            </label>
                            <input type="file" name="featured" class="form-control">
                          </div>

                            <div class="form-group">
                            
                              <label for="content">Content </label>
                                                          

                            <textarea name="content" id="content" cols="10" rows="10" class="form-control"></textarea>

                          </div>
                          
                          <div class="form-group">

                            <div class="text-center">
                            
                              <button class="btn btn-success" type="submit">
                                Store Post!
                              </button>
                            </div>
                          </div>
                  </form>


            </div>

        </div>
    </div>
</div>

@endsection

@section('styles')

<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>

@stop

@section('scripts')

<script>tinymce.init({selector:'textarea'});

</script>
@stop