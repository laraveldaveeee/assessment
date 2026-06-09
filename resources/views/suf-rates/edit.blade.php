@extends('layouts.app')
@section('content')



<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">SUF Rates</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">SUF Rates <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Edit SUF Rates</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="upload_form" action="/suf-rates/{{ $sufRate->id }}" method="POST">
                        	@csrf
                        	{{ method_field('PATCH') }}

                        	<div class="form-group">
                        	 	<label>Services </label>
                        	 	 <select class="form-control js-example-basic-multiple" id="services" name="services[]" multiple="">
                                    @foreach ($services as $key => $service)
                                        <option value="{{ $key }}" {{ $sufRate->serviceTemplates->contains('id', $key)  ? 'selected' : '' }}> {{ $service }} </option>
                                    @endforeach
                        	 	 </select>
							</select> 
    						</div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="suf_name" placeholder="Enter Name" value="{{ $sufRate->suf_name }}">
                            </div>

                            <div class="form-group">
                                <label>Rates</label>
                                <input type="text" class="form-control" name="rates" placeholder="Enter Rates" value="{{ $sufRate->rates }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
        </div>
    </div>


@endsection