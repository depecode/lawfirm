@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello '.$client['firstname'],
        'level' => 'h2',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p style="text-align: justify;">
        Welcome to Law Firm, a platform where you can find the right counsel,
    </p>

  

   
    
    
        <p style="text-align: justify;">
        Thank you!
        </p>


    @include('beautymail::templates.sunny.contentEnd')



@stop
