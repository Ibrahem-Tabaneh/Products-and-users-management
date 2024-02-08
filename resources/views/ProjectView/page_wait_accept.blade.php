@extends('ProjectView.main');

@section('tittle')
  wait page
@endsection

@section('content')


    Dear 

    Thank you for registering with . Your account is currently pending activation. We will review your information shortly.
    
    Once your account is activated, you will receive a confirmation email with further instructions. If you have any questions or concerns, please feel free to contact our support team at [your support email or contact form].
    
    Thank you for your patience.
    
    Best regards,
  
    <a href="{{route('HomePage')}}" class="btn btn-primary">Home</a>
    
    @endsection