@extends('frontend.layouts.default')

@section('content')
<section class="page-content">
    
    <div class="container">
        <div class="heading">
            <div class="content">
                <h1 class="page-title">Get Login link</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 notifications mrgn_15t">
                        <div class="success-message text-center">
                            <span class="msg-content"></span>
                        </div>
                        <div class="error-message text-center">
                            <span class="msg-content"></span>
                        </div>
                    </div>
                </div>
                <!-- Notifications -->
                @include('frontend.includes.notifications')
                <!-- ./ notifications -->
                {!! Form::open(['route' => 'sendemail', 'id' => 'login-form']) !!}
                <div class="input-group">
                    {!! Form::text('email','',array('id'=>'email','class'=>'form-control form-control-lg email','placeholder'=>'Enter Your Email')) !!}
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="email-btn">Send Email </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@stop