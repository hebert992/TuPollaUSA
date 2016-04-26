@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                    
                    @if(Session::has('flash_danger'))
                  
                  <div class="alert alert-danger" role="alert">{{Session::get('flash_danger')}}</div>
                   
                   
                    @endif
                <div class="panel-heading">Bienvenido</div>
@if(Session::has('flash_success'))
                  
                  <div class="alert alert-success" role="alert">{{Session::get('flash_success')}}</div>
                   {{Session::flush()}}
                   
                    @endif
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
