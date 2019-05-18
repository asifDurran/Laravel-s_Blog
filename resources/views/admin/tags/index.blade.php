@extends('layouts.app')

@section('content')

 
<div class="panel panel-defult">

@include('admin.session.alert')

    <div class="panel-body">
    <div class="panel-heading">Tag index</div>
        <table class="table table-hover">
            <thead>

                <th>
                Tag Name
                </th>
                <th>
                Editing Tag
                </th>

                <th>
                    Deleting Tag
                </th>

            </thead>

        <tbody>

            @if($tag->count() >0)

            @foreach($tag as $tag)

                <tr>
                    <td> {{ $tag->tag}}</td>
                <td>
                    <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-info">
                    Edit
                    </a>

                </td>

                <td>
                        <form action="{{route('tags.update',['id'=>$tag->id])}}" method="post">
                            {{csrf_field()}}

                            {{method_field('PUT')}}

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>



                    </td>
                </tr>
                @endforeach


                    @else

                    <th colspan="5" class="text-center" >There is no tags Available</th>


                    @endif


         </tbody>

        </table>



    </div>


</div>
 

@endsection