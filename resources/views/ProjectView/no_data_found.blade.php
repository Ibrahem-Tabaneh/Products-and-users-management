@extends('ProjectView.main');

@section('tittle')
  not found
@endsection

@section('content')


    @if (isset($data))

   
        <div   class="alert alert-success" style="text-align:center;margin:auto;" role="alert">
            {{$data}}
        </div>
     <div style="text-align: center;"><a href="{{route('admin.index')}}" class="btn btn-primary">back</a></div> 

    @endif

    @endsection