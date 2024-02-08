@extends('ProjectView.main');

@section('tittle')
  صفحة الرئيسية
@endsection

@section('content')

    <style>
        
    body{
     background-image: url('{{ asset('background.jpg') }}');
    height: 90%;
    width: 90%;
    background-repeat: no-repeat;
    background-size: cover;
    padding:10px;

       
}
    </style>
</head>
<body>
    <div class="contianer">
        
          <div style="float:right">
            <a href="{{ route('login') }}" class="btn btn-warning">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-success">Sign Up</a>
          </div>

    </div>  
    @endsection
  