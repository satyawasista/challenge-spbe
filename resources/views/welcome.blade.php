@extends('noble::master')

@section('content-header')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
    	<h4 class="mb-3 mb-md-0">Form 1</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <nav class="page-breadcrumb">
        	<ol class="breadcrumb">
        		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        		<li class="breadcrumb-item active" aria-current="page">Fom 1</li>
        	</ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        	<div class="card-header">
        		Header
        	</div>
        	<div class="card-body">
            	Welcome to Noble UI
        	</div>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')
	
@endsection
