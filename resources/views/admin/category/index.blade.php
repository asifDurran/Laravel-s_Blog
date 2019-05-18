@extends('layouts.app')

@section('content')

 
<div class="panel panel-defult">

@include('admin.session.alert')

    <div class="panel-body">
    <div class="panel-heading">Category index</div>
        <table class="table table-hover">
            <thead>

                <th>
                Category Name
                </th>
                <th>
                Editing Category
                </th>

                <th>
                    Deleting Category
                </th>

            </thead>

        <tbody>

            @if($category->count() >0)

            @foreach($category as $category)

                <tr>
                    <td> {{ $category->name}}</td>
                <td>
                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">
                    Edit
                    </a>

                </td>

                <td>
                        <form action="{{route('categories.destroy',['id'=>$category->id])}}" method="post">
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

                    <th colspan="5" class="text-center" >There is no category Available</th>


                    @endif


         </tbody>

        </table>



    </div>


</div>
 

@endsection