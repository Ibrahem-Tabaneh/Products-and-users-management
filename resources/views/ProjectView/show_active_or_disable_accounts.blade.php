@extends('ProjectView.main');

@section('tittle')
  accounts state
@endsection

@section('content')
  
 @if(isset($type_accounts)&& !empty($type_accounts))
  
@if ($type_accounts=='active')
<table class="table table-dark table-striped">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>type_count</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>update</th>
        <th>delete</th>
        <th>state_count</th>
    </tr>

    @foreach ($data as $item)

   <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>@if($item->is_admin==0) user  @else Admin @endif   </td> 
    <td>{{$item->created_at}}</td>
    <td >{{$item->updated_at}}</td>
   @if ($item->is_admin==0) <td><a href="{{route('edit',$item->id)}}"  class="btn btn-success">update</a></td> 
   @else <td><a   class="btn btn-success" style="visibility: hidden;">update</a></td> 
   @endif
    
   @if ($item->is_admin==0) <td><a href="{{route('delete',$item->id)}}"  class="btn btn-danger">delete</a></td>
   @else <td><a class="btn btn-success" style="visibility: hidden;">delete</a></td> 
    @endif 

   @if ($item->is_active==0 && $item->is_admin==0) <td><a href="{{route('active',$item->id)}}"  class="btn btn-primary">activation</a></td>
   @elseif ($item->is_active==1 && $item->is_admin==0) <td><a href="{{route('active',$item->id)}}"  class="btn btn-warning">Disable</a></td> 
    @else  <td><a href="" style="visibility: hidden"  class="btn btn-primary">Disable</a></td>
     @endif


   </tr>
        
    @endforeach

  </table>

<div style="display: flex;justify-content:space-around;">

  <a href="{{route('disable_all')}}" class="btn btn-warning">disable all</a>
  <a href="{{route('admin.index')}}" class="btn btn-primary">back</a>


</div>

  @elseif($type_accounts=='disable')

  <table class="table table-dark table-striped">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>type_count</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>update</th>
        <th>delete</th>
        <th>state_count</th>
    </tr>

    @foreach ($data as $item)

   <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>@if($item->is_admin==0) user  @else Admin @endif   </td> 
    <td>{{$item->created_at}}</td>
    <td >{{$item->updated_at}}</td>
   @if ($item->is_admin==0) <td><a href="{{route('edit',$item->id)}}"  class="btn btn-success">update</a></td> 
   @else <td><a   class="btn btn-success" style="visibility: hidden;">update</a></td> 
   @endif
    
   @if ($item->is_admin==0) <td><a href="{{route('delete',$item->id)}}"  class="btn btn-danger">delete</a></td>
   @else <td><a class="btn btn-success" style="visibility: hidden;">delete</a></td> 
    @endif 

   @if ($item->is_active==0 && $item->is_admin==0) <td><a href="{{route('active',$item->id)}}"  class="btn btn-primary">activation</a></td>
   @elseif ($item->is_active==1 && $item->is_admin==0) <td><a href="{{route('active',$item->id)}}"  class="btn btn-warning">Disable</a></td> 
    @else  <td><a href="" style="visibility: hidden"  class="btn btn-primary">Disable</a></td>
     @endif


   </tr>
        
    @endforeach

  </table>
  <div style="display: flex;justify-content: center;">{{ $data->links() }}</div> 

  
<div style="display: flex;justify-content:space-around;">

  <a href="{{route('active_all')}}" class="btn btn-primary">active all</a>
  <a href="{{route('admin.index')}}" class="btn btn-primary">back</a>


</div>

    
@endif
    
  

@else

<h1>لا يوجد حسابات</h1>


  @endif
    

   
  @endsection