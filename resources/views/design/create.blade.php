@extends('design.main');

@section('tittle')
    صفحة الاضافة
@endsection

@section('content')

<form enctype="multipart/form-data" method="POST" style="width:80%;margin:0 auto;" action="{{route('store_products')}}">
  @csrf
    <div class="mb-3">
      <label  class="form-label">name</label>
      <input type="text" class="form-control"  name="name" value="{{old('name')}}" >

      @error('name')
       <span class="text-danger">{{$message}}</span>   
      @enderror
 </div>


    <div class="mb-3">
      <label  class="form-label">price</label>
      <input type="text" class="form-control"  name="price" value="{{old('price')}}" >
      
      @error('price')
       <span class="text-danger">{{$message}}</span>   
      @enderror
 </div>

    <div class="mb-3">
      <label  class="form-label">description</label>
      <input type="text" class="form-control"  name="description" value="{{old('description')}}" >
      
      
      @error('description')
       <span class="text-danger">{{$message}}</span>   
      @enderror

 </div>

    
  
     <div class="mb-3">
      <label  class="form-label">photo</label>
      <input type="file" class="form-control"  name="photo" value="{{old('photo')}}" />

        
      @error('photo')
       <span class="text-danger">{{$message}}</span>   
      @enderror
      
</div>

<div style="display: flex;justify-content: space-between;">
  <button type="submit" class="btn btn-primary">submit</button>
  <a href="{{route('index_products')}}" class="btn btn-primary">back</a>

</div>

  </form>
     
@endsection

