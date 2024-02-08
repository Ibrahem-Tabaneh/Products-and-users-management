@extends('ProjectView.main');

@section('tittle')
  صفحة التعديل
@endsection

@section('content')

    <div class="content" style="width:50%;margin:auto;">
    

        <form method="POST" action="{{route('store',$data->id)}}">
            @csrf
    
    
            <div class="mb-3">
              <label for="name" class="form-label">{{ __('Name') }}</label>
              <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name"  value="{{ $data->name }}">
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
        
            </div>
    
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">{{ __('Email Address') }}</label>
              <input type="email" name="email" value="{{$data->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   autofocus name="email" value="{{ old('email') }}">
              @error('email')
                  <span class="text-danger">{{$message}}</span>
              @enderror
           
            </div>
    
    
            <div class="mb-3">
              <label for="exampleusertype" class="form-label">{{ __('UserType') }}</label>
              <select name="usertype" class="form-control">
                <option value="">select</option>
                <option value="1" @if ($data->is_admin==1) selected @endif>admin</option>
                <option value="0"  @if ($data->is_admin==0) selected @endif>user</option>
              </select>
              @error('usertype')
              <span class="text-danger">{{$message}}</span>
          @enderror
     
            </div>
    
    
    
             <div style="display: flex;justify-content: space-between;">

              <button type="submit" class="btn btn-success"> {{ __('update') }}</button>
              <a href="{{route('admin.index')}}" class="btn btn-primary">back</a>

            </div>
    
           
    
          </form>
        </div>
       

        @endsection



