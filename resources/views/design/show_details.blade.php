@extends('design.main')

@section('title')
    صفحة التفاصيل
@endsection

@section('content')


@if(session('message'))
<div  id="success-message" class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
    {{ session('message') }}
</div>
@endif

<div  id="error-message" class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
    <h2 style="text-align: center;padding:10px;"> Product Details</h2>

    <div >

        @if($data->photo)
        <img src="{{ asset('uploads/'.$data->photo) }}" alt="" style="width:300px;height:300px;">
    
     @else
         <p>لا تتوفر صورة</p>
     @endif

 <h5 style="margin-top:10px;"> <b>type</b>:{{$data->name }}</h5>

<p style="margin-top:10px;"><b>description</b>:{{ $data->description }}</p>

    </div>
   
    <div style="display: flex;justify-content:space-between;">

        
        <a href="{{ auth()->check() && auth()->user()->is_admin == 0 ? route('userpage') : route('index_products') }}" class="btn btn-primary mt-3">back</a>



      @if (auth()->check() && auth()->user()->is_admin== 0)
          
        @if( auth()->user()->interestedProducts->contains($data->id))
        {{-- إذا كان المنتج موجودًا في قائمة الرغبات --}}
        
        <a href="{{ route('removeProductFromWishlist', $data->id) }}" class="btn btn-danger mt-3">Not interested</a>
    @else
        {{-- إذا كان المنتج غير موجود في قائمة الرغبات --}}
        <a href="{{ route('addProductToWishlist', $data->id) }}" class="btn btn-primary mt-3">interested</a>
    @endif
       
    @endif
</div>


<script>
    setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 3000); // 5000 مللي ثانية (5 ثوانٍ)
        </script>

@endsection
