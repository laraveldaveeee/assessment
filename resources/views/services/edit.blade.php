@extends('layouts.app')

@section('content')



<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/services">Service</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Service Edit </h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Service Edit</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">

						<form method="POST" action="{{ route('services.update', $service) }}">

							@csrf

							{{ method_field('PATCH') }}
							<div class="row">

							{{--  <div class="col-md-3">
								 <div class="form-group">
	                                <label>Label</label>
	                                <input type="text" class="form-control" name="label" value="{{ $service->label }}">
	                            </div>
                            </div> --}}

                            <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Name</label>
	                                <input type="text" class="form-control" name="name" value="{{ $service->name }}">
	                            </div>
                            </div>

							<div class="col-md-3">
								<div class="form-group{{ $errors->has('roc_fee') ? ' has-error' : '' }}">
		                            <label>628 (2)  ROC FEE</label>
		                            <input type="text" name="roc_fee" class="form-control" value="{{ $service->roc_fee ?? '' }}">
		                             @if ($errors->has('roc_fee'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('roc_fee') }}</strong>
		                                </span>
		                           @endif
		                        </div>
	                        </div>

                         	<div class="col-md-3">
								<div class="form-group">
									<label>628 (1) APP FEE</label>
									<input type="text" class="form-control" name="app_fee" value="{{ $service->app_fee ?? '' }}">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label>628 (2) FILLING FEE</label>
									<input type="text" class="form-control" name="filing_fee" value="{{ $service->filing_fee ?? '' }}">
								</div>
							</div>

							 <div class="col-md-3">
								<div class="form-group">
									<label>DST </label>
									<input type="text" class="form-control" name="dst_fee" value="{{ $service->dst_fee ?? '' }}">
								</div>
							</div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Seminar Fee</label> 
                                    <input type="text" class="form-control" name="seminar_fee" value="{{ $service->seminar_fee ?? ' '}}">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class='form-group'>
                                    <label>Examination Fee</label>
                                    <input type='text'  class='form-control' name="examination_fee" value="{{ $service->examination_fee	?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">            
                                <div class="form-group">
                                    <label>Duplicate Fee</label>
                                    <input type="text" class="form-control" name="duplicate_fee" value="{{ $service->duplicate_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Modification Fee </label>
                                    <input type="text" class="form-control" name="modification_fee" value="{{ $service->modification_fee ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>License Fee</label>
                                    <input type="text" class="form-control" name="license_fee" value="{{ $service->license_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Permit to Possess Fee</label>
                                    <input type="text" class="form-control" name="permit_possess_fee" value="{{ $service->permit_possess_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Purchase Permit Fee</label>
                                    <input type="text" class="form-control" name="purchase_permit_fee" value="{{ $service->purchase_permit_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Possess Permit Fee</label>
                                    <input type="text" class="form-control" name="possess_permit_fee" value="{{ $service->possess_permit_fee ?? '' }}">
                                </div>
                            </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Construction Permit Fee</label>
                                    <input type="text" class="form-control" name="construction_permit_fee" value="{{ $service->purchase_permit_fee ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Sell/Transfer Fee</label>
                                    <input type="text" class="form-control" name="sell_transfer_fee" value="{{ $service->sell_transfer_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Inspection Fee</label>
                                    <input type="text" class="form-control" name="inspection_fee" value="{{ $service->inspection_fee ?? '' }}">
                                </div>
                            </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Registration Fee</label>
                                    <input type="text" class="form-control" name="registration_fee" value="{{ $service->registration_fee ?? '' }}">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Spectrum Users Fee</label>
                                    <input type="text" class="form-control" name="spectrum_users_fee" value="{{ $service->spectrum_users_fee ?? '' }}">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Permit Fee</label>
                                    <input type="text" class="form-control" name="permit_fee" value="{{ $service->permit_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Import Permit Fee</label>
                                    <input type="text" class="form-control" name="import_permit_fee" value="{{ $service->import_permit_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Certificate Of Exemption</label>
                                    <input type="text" class="form-control" name="certificate_of_exemption" value="{{ $service->certificate_of_exemption ?? '' }}">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Administrative</label>
                                    <input type="text" class="form-control" name="administrative" value="{{ $service->administrative ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>All Permits and Licenses</label>
                                    <input type="text" class="form-control" name="all_permits_and_licenses" value="{{ $service->all_permits_and_licenses ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Modification Fee </label>
                                    <input type="text" class="form-control" name="modification_fee" value="{{ $service->modification_fee ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Accreditation Fee </label>
                                    <input type="text" class="form-control" name="accreditation_fee" value="{{ $service->accreditation_fee ?? '' }}">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Metro Manila </label>
                                    <input type="text" class="form-control" name="metro_manila" value="{{ $service->metro_manila ?? '' }}">
                                </div>
                            </div>

                               <div class="col-md-3">
                                <div class="form-group">
                                    <label>Highly Urbanized Cities</label>
                                    <input type="text" class="form-control" name="highly_urbanized_cities" value="{{ $service->highly_urbanized_cities ?? '' }}">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>All Other Areas</label>
                                    <input type="text" class="form-control" name="all_other_areas" value="{{ $service->all_other_areas ?? '' }}">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cert. Of Exemption</label>
                                    <input type="text" class="form-control" name="certificate_of_exemption" value="{{ $service->certificate_of_exemption ?? '' }}">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Release Clearance Two Unit Below</label>
                                    <input type="text" class="form-control" name="release_clearance_two_units_below" value="{{ $service->release_clearance_two_units_below ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Release Clearance Three Unit Below</label>
                                    <input type="text" class="form-control" name="release_clearance_three_units_below" value="{{ $service->release_clearance_three_units_below ?? '' }}">
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Supervision & Regulation Fees (SRF)</label>
                                    <input type="text" class="form-control" name="supervision_regulation_fees" value="{{ $service->supervision_regulation_fees ?? '' }}">
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Clearance Fee</label>
                                    <input type="text" class="form-control" name="clearance_fee" value="{{ $service->clearance_fee ?? '' }}">
                                </div>
                            </div>


                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Certification Fee</label>
                                    <input type="text" class="form-control" name="certification_fee" value="{{ $service->certification_fee ?? '' }}">
                                </div>
                            </div>



                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cert. True Copy Fee</label>
                                    <input type="text" class="form-control" name="cert_true_copy_fee" value="{{ $service->cert_true_copy_fee ?? '' }}">
                                </div>
                            </div>



                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Rad. Stn. Lic.</label>
                                <input type="text" class="form-control" name="radio_station_license_fee" value="{{ $service->radio_station_license_fee ?? '' }}">
                            </div>
                        </div>


                          <div class="col-md-12">
                            <div class="form-group">
                                <label>Types of License</label>
                                <select class="form-control" name="types">
                                    <option value="Select Type" disabled="" selected="">Select Type</option>
                                    <option value="NEW">NEW</option>
                                    <option value="RENEW">RENEW</option>
                                </select>
                            </div>
                        </div>


                            </div>


						 
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>

						</form>
							
						</form>

					</div>
				</div>
			</div>
		</div>
</div>













@endsection