@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <center>
                    	<h1 class="page-header">
                            Welcome Back !! {{ Auth::user()->name }}
                        </h1>
                    </center>
                        
                    </div>
                </div>
            </div>
        </div>
@endsection