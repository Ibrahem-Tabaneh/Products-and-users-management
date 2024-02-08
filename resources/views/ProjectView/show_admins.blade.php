@extends('ProjectView.main');

@section('tittle')
  accounts admins
@endsection

@section('content')

   
    @if (!empty($data))

    <table class="table table-dark table-striped">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>type_count</th>
            <th>created_at</th>
            <th>updated_at</th>
          
        </tr>

        @foreach ($data as $item)

       <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>@if($item->is_admin==1) admin @endif   </td> 
        <td>{{$item->created_at}}</td>
        <td >{{$item->updated_at}}</td>
       
        

       </tr>
            
        @endforeach
       
      </table>

 <div style="display: flex;justify-content:center;"> {{ $data->links() }}</div>
     
<div style="text-align: center;">
    <a href="{{route('admin.index')}}" class="btn btn-primary">back</a>

</div>

    @endif

   
   
    @endsection

