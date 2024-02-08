
@extends('design.main')

@section('title')
    صفحة البحث
@endsection

@section('content')

  

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
        <td>@if($item->is_admin==0) user  @else Admin @endif   </td> 
        <td>{{$item->created_at}}</td>
        <td >{{$item->updated_at}}</td>
      


       </tr>
            
        @endforeach

      </table>
<div>
    <a href="{{ auth()->check() && auth()->user()->is_admin == 0 ? route('userpage') : route('index_products') }}" class="btn btn-primary mt-3">back</a>

</div>
  
  
@endsection
