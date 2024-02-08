@extends('design.main');

@section('tittle')
    صفحة البحث
@endsection

@section('content')




   
    
</div>

<table class="table  " style="text-align: center;margin-top:70px;">
    
@if (!empty($data))
<tr class="table-dark ">

    <th>id</th>  
    <th>name</th>
    <th> price</th>  
    <th>created_at</th>  
    <th>updated_at</th>  
    <th>Update</th>  
    <th>Delete</th>  
    <th>Details</th>
    <th>showInterestedUsers</th>
      

</tr>
 
@foreach ($data as $item)

<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}</td>
    <td>{{$item->created_at}}</td>
    <td>{{$item->updated_at}}</td>
    <td><a href="{{route('edit_product',$item->id)}}" class="btn btn-primary">Update</a></td>
    <td><a href="{{route('delete_product',$item->id)}}" class="btn btn-danger">Delete</a></td>
    <td><a href="{{route('show_product',$item->id)}}" class="btn btn-secondary">Show</a></td>
    <td><a href="{{route('showInterestedUsers',$item->id)}}" class="btn btn-success">showInterestedUsers</a></td>
    
</tr>
    
@endforeach
  
@endif

  </table>  


  <div style="text-align: center;">
    <a href="{{route('index_products')}}" class="btn btn-primary">back</a>
    </div>
    
  
@endsection


   