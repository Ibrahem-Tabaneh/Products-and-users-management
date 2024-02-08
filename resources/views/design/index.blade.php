@extends('design.main');

@section('tittle')
    صفحة المنتجات
@endsection

@section('content')

<div class="alert alert-secondary" role="alert" style="text-align: center"> 
    <h5>Products Management Page</h5> 
   </div>

@if(session('success'))
<div  id="error-message" class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
    {{ session('success') }}
</div>
@endif

<div style="margin-top:30px;">
    <a href="{{route('create_product')}}" class="btn btn-success">Add-new</a>

    <form method="GET" action="{{route('search')}}" style="width:25%;float: right;">
 
        <button class="btn btn-primary" type="submit">search</button>

        <input name="search_name" type="text" style="width:75%;border-radius:10px;outline: none;border:1px solid black;padding:7px;"/>
        
      @error('search_name')
      <span class="text-danger">{{$message}}</span>   
     @enderror


  </form>
   
    
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
    <a href="{{route('admin.index')}}" class="btn btn-dark">User Management Page</a>
    </div>
    
  
@endsection


<script>
    setTimeout(function() {
                document.getElementById('error-message').style.display = 'none';
            }, 3000); // 5000 مللي ثانية (5 ثوانٍ)
        </script>