
@extends('ProjectView.main');

@section('tittle')
    صفحة مدير النظام
@endsection



@section('content')


    <div class="alert alert-secondary" role="alert" style="text-align: center"> 
       <h5>welcome to admin page</h5> 

      </div>

    <!-- في عرض الـAdminPage -->
@if(session('success'))
<div  id="error-message" class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
    {{ session('success') }}
</div>
@endif


    

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

      <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
   
<div style="text-align: center;">
    <a href="{{route('show_active_accounts')}}" class="btn btn-success">show active accounts </a>
    <a href="{{route('show_disable_accounts')}}" class="btn btn-warning">show disable accounts </a>
    <a href="{{route('show_admins')}}" class="btn btn-secondary">show admins account </a>
    <a href="{{route('index_products')}}" class="btn btn-dark">Products Management Page </a>
</div>



    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger"> Logout</button>
    </form>
    
    <a href="{{ route('edit_profile', ['id' => auth()->id()]) }}" class="btn btn-secondary">profile</a>
    

   
    <script>
setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 3000); // 5000 مللي ثانية (5 ثوانٍ)
    </script>


@endsection
