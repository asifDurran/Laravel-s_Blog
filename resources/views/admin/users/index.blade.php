@extends('layouts.app')

@section('content')

 
<div class="panel panel-defult">

@include('admin.session.alert')

 <div class="panel-body">
  <div class="panel-heading">Users</div>
    <table class="table table-hover">
            <thead>
            
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Permissions 
                    </th>
                    <th>
                        Deletes
                    </th>

            </thead>
        
        <tbody>
        
            @if($users->count() >0)

            @foreach($users as $user)
                    <tr>
                            <td>
                            <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px" style="border-radius:  50%;">
                            </td>
                              
                            <td>
                                {{ $user->name}}
                            </td>
                          
                            <td>
                                @if($user->admin)
                                   
                                <a href="{{ route('user.not_admin', ['id' => $user->id])}}" class="btn btn-xs btn-danger">Remove Permession</a>


                                  
                                @else
                                  <a href="{{ route('user.admin', ['id' => $user->id])}}" class="btn btn-xs btn-success" >Permission Admin</a>

                                @endif 
                            </td>   
                            <td>
                              
                               @if(Auth::id() !== $user->id)

                              <form action="{{route('users.destroy',['id'=>$user->id])}}" method="post">
                                {{csrf_field()}}
                                
                                {{method_field('PUT')}}

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" name="submit" class="btn btn-primary" value="Delete">
                             </form>
                            @endif
 
                           

                            </td>
                            
                            
                    </tr>
                @endforeach

                @else

                    <th colspan="5" class="text center">No users</th>
                    @endif
                
        
        </tbody>
    
    </table>


 
 </div>


</div>
 

@endsection