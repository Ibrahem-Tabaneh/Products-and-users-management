@extends('ProjectView.main');

@section('tittle')
  page user
@endsection

@section('content')

    <div class="alert alert-secondary" role="alert" style="text-align: center"> 
        <h5>welcome to user page</h5> 
       </div>
   <!-- في عرض الـAdminPage -->
  

   @if(session('success'))
   <div  id="success-message" class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
       {{ session('success') }}
   </div>
   @endif


    <table class="table " style="text-align: center;margin-top:70px;">
    
        @if (!empty($data))
        <tr class="table-dark ">
        
            <th>id</th>  
            <th>name</th>
            <th> price</th>  
            <th>created_at</th>  
            <th>updated_at</th>  
            <th>Details</th>  
        
        </tr>
         
        @foreach ($data as $item)
        
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td><a href="{{route('show_product',$item->id)}}" class="btn btn-secondary">Show</a></td>
        </tr>
            
        @endforeach
          
        @endif
        
          </table>  
        <div style="display:flex;justify-content:center;">{{ $data->links() }}</div>  

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger"> Logout</button>
    </form>

   <!-- <a href="" class="btn btn-secondary">profile</a>-->
    <a href="{{ route('edit_profile', ['id' => auth()->id()]) }}" class="btn btn-secondary">profile</a>

  
    <script>
        setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 3000); // 5000 مللي ثانية (5 ثوانٍ)
            </script>
  @endsection