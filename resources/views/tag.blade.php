@extends('layouts.frontend')


@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tags: {{$tag->name}}</h1>
        </div>
    </div>



    
<div class="container">
        <div class="row medium-padding120">
            <main class="main">
                
                <div class="row">
                
                            @foreach($tag->posts as $post)

                            <div class="case-item-wrap">

                                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                <img src="{{ $post->featured}}" alt="our case">
                                            </div>
                                            <a href="{{route('single.post', ['slug' =>$post->slug])}}"><h6 class="case-item__title"> {{$post->title}}</h6></a>
                            
                                        </div>
                                    </div>
                            </div>

                            @endforeach
                </div>

                <!-- End Post Details -->
        
                <!-- End Sidebar-->

            </main>
        </div>
</div>




@endsection