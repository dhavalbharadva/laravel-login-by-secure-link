@extends('frontend.layouts.default')

@section('content')

<section class="page-content">

    <div class="container">
        <div class="heading">
            <div class="content">
                <h1 class="page-title">Welcome!!!</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-6">
                <div class="row">
                    <dl class="row">
                        <dt class="col-sm-3">First Name</dt>
                        <dd class="col-sm-9">{!! $user->firstname!!}</dd>
                        
                        <dt class="col-sm-3">Last Name</dt>
                        <dd class="col-sm-9">{!! $user->lastname!!}</dd>
                        
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{!! $user->email!!}</dd>
                        
                        <dt class="col-sm-3">Auth Token</dt>
                        <dd class="col-sm-9 text-break">{!! $user->token !!}</dd>
                        
                        <dt class="col-sm-3">Profile API</dt>
                        <dd class="col-sm-9">{!! url('api/profile') !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</section>

@stop