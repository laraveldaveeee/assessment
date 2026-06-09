@extends('layouts.app')

@section('content')
 <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Services</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Services <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->

            <!-- begin panel -->
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add Services</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="upload_form">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                  {{--   <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-inverse" id="mySelect"  name="name"  onchange="myFunction()">
                                        <option value="" disabled="" selected="" >Select Services Type</option>
                                        <option value="RLM - RADIO RESTRICTED LAND MOBILE">RLM - RADIO RESTRICTED LAND MOBILE</option>
                                        <option value="GROC - GOVERNMENT RADIO OPERATORS CERTIFICATE">GROC - GOVERNMENT RADIO OPERATORS CERTIFICATE</option>
                                        <option value="RROC - RADIO TELEPHONE RADIO OPERATOR CERTIFICATE FOR LAND MOBILE">RROC - RADIO TELEPHONE RADIO OPERATOR CERTIFICATE FOR LAND MOBILE</option>
                                        <option value="RROC - RADIO TELEPHONE OPERATOR CERTIFICATE – AIRCRAFT">RROC - RADIO TELEPHONE OPERATOR CERTIFICATE – AIRCRAFT</option>
                                        <option value="ROC -RADIO OPERATOR’S CERTIFICATE - (DUPLICATE COPY)">ROC -RADIO OPERATOR’S CERTIFICATE - (DUPLICATE COPY)</option>
                                        <option value="SROP FB">SROP FB</option>
                                        <option value="SROP - SPECIAL RADIO OPERATORS PERMIT">SROP - SPECIAL RADIO OPERATORS PERMIT</option>
                                        <option value="RADIO OPERATORS CERTIFICATE (MODIFICATION)">RADIO OPERATORS CERTIFICATE (MODIFICATION)</option>
                                        <option value="AMATEUR RADIO OPERATORS CERTIFICATE (AT-ROC) (NEW)">AMATEUR RADIO OPERATOR’S CERTIFICATE (AT-ROC) (NEW)</option>

                                        <option value="ARSL - AMATEUR RADIO STATION LICENSE (NEW)">ARSL - AMATEUR RADIO STATION LICENSE (NEW)</option>
                                        <option value="ARSL - CLASS A">ARSL - CLASS A</option>
                                        <option value="ARSL - CLASS B">ARSL - CLASS B</option>
                                        <option value="ARSL - CLASS C">ARSL - CLASS C</option>
                                        <option value="ARSL - CLASS D">ARSL - CLASS D</option>


                                        <option value="AMATEUR CLUB RADIO STATION LICENSE (NEW)">AMATEUR CLUB RADIO STATION LICENSE (NEW)</option>
                                        <option value="ROE - RADIO OPERATORS EXAM (NEW)">ROC - RADIO OPERATORS EXAM (NEW)</option>
                                        <option value="ROC - RADIO OPERATORS CERTIFICATE (NEW)">ROC - RADIO OPERATORS CERTIFICATE (NEW)</option>
                                        <option value="ROC - 1PHN">ROC - 1PHN</option>
                                        <option value="ROC - 2PHN">ROC - 2PHN</option>
                                        <option value="ROC - 3PHN">ROC - 3PHN</option>
                                        <option value="ROC - 1RTG">ROC - 1RTG</option>
                                        <option value="ROC - 2RTG">ROC - 2RTG</option>
                                        <option value="ROC - 3RTG">ROC - 3RTG</option>
                                        <option value="RESTRICTED RADIO TELEPHONE OPERATOR CERTIFICATE (RROC) – AIRCRAFT">RESTRICTED RADIO TELEPHONE OPERATOR CERTIFICATE (RROC) – AIRCRAFT</option>

                                        <option value="AMATEUR RADIO STATION LICENSE AT RSL (MODIFICATION)">AMATEUR RADIO STATION LICENSE (AT-RSL) (MODIFICATION)</option>
                                        <option value="LIFETIME AMATEUR RADIO STATION LICENSE FOR CLASS A">LIFETIME AMATEUR RADIO STATION LICENSE FOR CLASS A</option>
                                        <option value="AMATEUR CLUB RADIO STATION LICENSE (NEW)">AMATEUR CLUB RADIO STATION LICENSE (NEW)</option>
                                        <option value="RSL SIMPLEX (NEW)">RSL SIMPLEX (NEW)</option>
                                        <option value="RSL REPEATER (NEW)">RSL REPEATER (NEW)</option>
                                        <option value="AMATEUR CLUB RADIO STATION LICENSE (MODIFICATION)">AMATEUR CLUB RADIO STATION LICENSE (MODIFICATION)</option>
                                        <option value="RSL SIMPLEX (MODIFICATION)">RSL SIMPLEX (MODIFICATION)</option>
                                        <option value="RSL REPEATER (MODIFICATION)">RSL REPEATER (MODIFICATION)</option>

                                        <option value="PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER">PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER</option> --}}
                                       {{--  <option value="PERMIT TO PURCHASE">PERMIT TO PURCHASE</option>
                                        <option value="PERMIT TO POSSESS">PERMIT TO POSSESS</option>
                                        <option value="PERMIT TO SELL">PERMIT TO SELL</option>
                                        <option value="PERMIT TO TRANSFER">PERMIT TO TRANSFER</option> --}}
{{-- 
                                        <div class="form-group">
                                        <div id="demo"></div>
                                        </div>
                                        <div id="services"></div>
 --}}
                            <div class="row">
                            <div class="col-md-3">
                                <div class='form-group'>
                                    <label>Roc Fee</label>
                                    <input type='text'  class='form-control' name='roc_fee'>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class='form-group'>
                                <label>App Fee</label>
                                    <input type='text' class='form-control' name='app_fee'>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Filing Fee</label>
                                    <input type="text" class="form-control" name="filing_fee">
                                </div>
                            </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    <label>DST Fee</label>
                                    <input type="text" class="form-control" name="dst_fee">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Seminar Fee</label>
                                    <input type="text" class="form-control" name="seminar_fee">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class='form-group'>
                                    <label>Examination Fee</label>
                                    <input type='text'  class='form-control' name='examination_fee'>
                                </div>
                            </div>

                            <div class="col-md-3">            
                                <div class="form-group">
                                    <label>Duplicate Fee</label>
                                    <input type="text" class="form-control" name="duplicate_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Modification Fee </label>
                                    <input type="text" class="form-control" name="modification_fee">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>License Fee</label>
                                    <input type="text" class="form-control" name="license_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Permit to Possess Fee</label>
                                    <input type="text" class="form-control" name="permit_possess_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Purchase Permit Fee</label>
                                    <input type="text" class="form-control" name="purchase_permit_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Possess Permit Fee</label>
                                    <input type="text" class="form-control" name="possess_permit_fee">
                                </div>
                            </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Construction Permit Fee</label>
                                    <input type="text" class="form-control" name="construction_permit_fee">
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Sell/Transfer Fee</label>
                                    <input type="text" class="form-control" name="sell_transfer_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Inspection Fee</label>
                                    <input type="text" class="form-control" name="inspection_fee">
                                </div>
                            </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Registration Fee</label>
                                    <input type="text" class="form-control" name="registration_fee">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Spectrum Users Fee</label>
                                    <input type="text" class="form-control" name="spectrum_users_fee">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Permit Fee</label>
                                    <input type="text" class="form-control" name="permit_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Import Permit Fee</label>
                                    <input type="text" class="form-control" name="import_permit_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Certificate Of Exemption</label>
                                    <input type="text" class="form-control" name="certificate_of_exemption">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Administrative</label>
                                    <input type="text" class="form-control" name="administrative">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>All Permits and Licenses</label>
                                    <input type="text" class="form-control" name="all_permits_and_licenses">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Modification Fee </label>
                                    <input type="text" class="form-control" name="modification_fee">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Accreditation Fee </label>
                                    <input type="text" class="form-control" name="accreditation_fee">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Metro Manila </label>
                                    <input type="text" class="form-control" name="metro_manila">
                                </div>
                            </div>

                               <div class="col-md-3">
                                <div class="form-group">
                                    <label>Highly Urbanized Cities</label>
                                    <input type="text" class="form-control" name="highly_urbanized_cities">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>All Other Areas</label>
                                    <input type="text" class="form-control" name="all_other_areas">
                                </div>
                            </div>


                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cert. Of Exemption</label>
                                    <input type="text" class="form-control" name="certificate_of_exemption">
                                </div>
                            </div>

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Release Clearance Two Unit Below</label>
                                    <input type="text" class="form-control" name="release_clearance_two_units_below">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Release Clearance Three Unit Below</label>
                                    <input type="text" class="form-control" name="release_clearance_three_units_below">
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Supervision & Regulation Fees (SRF)</label>
                                    <input type="text" class="form-control" name="supervision_regulation_fees">
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Clearance Fee</label>
                                    <input type="text" class="form-control" name="clearance_fee">
                                </div>
                            </div>


                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Certification Fee</label>
                                    <input type="text" class="form-control" name="certification_fee">
                                </div>
                            </div>



                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cert. True Copy Fee</label>
                                    <input type="text" class="form-control" name="cert_true_copy_fee">
                                </div>
                            </div>



                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Rad. Stn. Lic.</label>
                                <input type="text" class="form-control" name="radio_station_license_fee">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>

                 <div class="col-md-12">
            <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Services list</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">

                            <table class="table table-bordered" id="services-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
 
            <!-- end #content -->
          
            <!-- end panel -->
        </div>
        <!-- end #content -->
@endsection

@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {

    $('#services-table').DataTable({
        "ordering":'true',
        "order": [0, 'desc'],
        processing: true,
        serverSide: true,

        ajax: '{!! route('services.index') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name',},
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

        $("#upload_form").on('submit', function(e){
        e.preventDefault();

        swal({
          title: "Do you want to add another Services Fees?",
          // text: " Success!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((response) => {
            if (response) {
                $.ajax({
                route: '{{ url('services') }}',
                    method: 'POST',
                    data:new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    cache : false,
                    success:function(data){
                        swal({
                              title: 'Success!',
                              text: data.message,
                              type: 'success',
                              icon: 'success'
                          })

                        document.getElementById("upload_form").reset(); 

                        var oTable = $('#services-table').dataTable();
                        oTable.fnDraw(false);
                   },
                   
                   error:function (data) {
                      swal({
                          title: 'Oops...',
                          text: 'Error',
                          type: 'error',
                          icon: 'error'
                      })                        
                   }
               });
            }
        })
    });
});
    

</script>
@endpush

{{-- @push('scripts')

<script>
$(function() {
   
</script> --}}

{{--     <script type="text/javascript">

         function myFunction() {

            var selected = document.getElementById("mySelect").value;

            if (selected === 'RLM - RADIO RESTRICTED LAND MOBILE' || 'GROC - GOVERNMENT RADIO OPERATORS CERTIFICATE' || 'RROC - RADIO TELEPHONE RADIO OPERATOR CERTIFICATE FOR LAND MOBILE' || 'RROC - RADIO TELEPHONE RADIO OPERATOR CERTIFICATE FOR LAND MOBILE') {
                document.getElementById("demo").innerHTML = '';

                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>
                <div class='form-group'>
                <label>App Fee</label>
                <input type='text' class='form-control' name='app_fee'>
                </div>
                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;
            } if(selected === 'SROP FB') {
                 document.getElementById("demo").innerHTML = '';

                  document.getElementById("services").innerHTML = `
                 <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>
                <div class='form-group'>
                <label>App Fee</label>
                <input type='text' class='form-control' name='app_fee'>
                </div>
                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
                
                 <div class="form-group">
                    <label>Seminar Fee</label>
                    <input type="text" class="form-control" name="seminar_fee">
                </div>
                `;
            } if(selected === 'SROP - SPECIAL RADIO OPERATORS PERMIT') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                 <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>
               
                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
                
                 <div class="form-group">
                    <label>Seminar Fee</label>
                    <input type="text" class="form-control" name="seminar_fee">
                </div>
                `;
            } if(selected === 'ROC -RADIO OPERATOR’S CERTIFICATE - (DUPLICATE COPY)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Duplicate Fee</label>
                    <input type="text" class="form-control" name="duplicate_fee">
                </div>
               
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
                
                `;
            } if (selected === 'RADIO OPERATORS CERTIFICATE (MODIFICATION)') {


                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

               
                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>Modification Fee </label>
                    <input type="text" class="form-control" name="modification_fee">
                </div>
                
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
                `;
            } if (selected === 'ARSL - AMATEUR RADIO STATION LICENSE (NEW)') {
                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Roc Fee</label>
                    <input type="text" class="form-control" name="roc_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'ARSL - CLASS A') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Roc Fee</label>
                    <input type="text" class="form-control" name="roc_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;

            } if (selected === 'ARSL - CLASS B') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Roc Fee</label>
                    <input type="text" class="form-control" name="roc_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
                
            } if (selected === 'ARSL - CLASS C') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Roc Fee</label>
                    <input type="text" class="form-control" name="roc_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
                
            } if (selected === 'ARSL - CLASS D') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Roc Fee</label>
                    <input type="text" class="form-control" name="roc_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
                
            } if(selected === 'RROC - RADIO TELEPHONE OPERATOR CERTIFICATE – AIRCRAFT') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'AMATEUR RADIO OPERATORS CERTIFICATE (AT-ROC) (NEW)') {
                 document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'ROE - RADIO OPERATORS EXAM (NEW)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Examination Fee</label>
                    <input type='text'  class='form-control' name='examination_fee'>
                </div>`;
            } if (selected === 'ROC - RADIO OPERATORS CERTIFICATE (NEW)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'ROC - 1PHN') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'ROC - 2PHN') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'ROC - 3PHN') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;
            } if (selected === 'ROC - 1RTG') {

                document.getElementById("demo").innerHTML = '';

                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;

            } if (selected === 'ROC - 2RTG') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;
            } if (selected === 'ROC - 3RTG') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;
            } if (selected === 'RESTRICTED RADIO TELEPHONE OPERATOR CERTIFICATE (RROC) – AIRCRAFT') {


                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `
                <div class='form-group'><label>Roc Fee</label>
                <input type='text'  class='form-control' name='roc_fee'>
                </div>

                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>`;
            }  if (selected === 'AMATEUR RADIO STATION LICENSE AT RSL (MODIFICATION)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>
                <div class="form-group">
                    <label>Modification Fee</label>
                    <input type="text" class="form-control" name="modification_fee">
                </div>
                <div class="form-group">
                    <label>Permit to Possess Fee</label>
                    <input type="text" class="form-control" name="permit_possess_fee">
                </div>
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'LIFETIME AMATEUR RADIO STATION LICENSE FOR CLASS A') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>
                <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>
              
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'AMATEUR CLUB RADIO STATION LICENSE (NEW)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>Purchase Permit Fee</label>
                    <input type="text" class="form-control" name="purchase_permit_fee">
                </div>

                <div class="form-group">
                    <label>Possess Permit Fee</label>
                    <input type="text" class="form-control" name="possess_permit_fee">
                </div>

                 <div class="form-group">
                    <label>Construction Permit Fee</label>
                    <input type="text" class="form-control" name="construction_permit_fee">
                </div>

                 <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>

              
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;

            } if (selected === 'RSL SIMPLEX (NEW)') {


                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>Purchase Permit Fee</label>
                    <input type="text" class="form-control" name="purchase_permit_fee">
                </div>

                <div class="form-group">
                    <label>Possess Permit Fee</label>
                    <input type="text" class="form-control" name="possess_permit_fee">
                </div>

                 <div class="form-group">
                    <label>Construction Permit Fee</label>
                    <input type="text" class="form-control" name="construction_permit_fee">
                </div>

                 <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>

              
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'RSL REPEATER (NEW)') {


                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>Purchase Permit Fee</label>
                    <input type="text" class="form-control" name="purchase_permit_fee">
                </div>

                <div class="form-group">
                    <label>Possess Permit Fee</label>
                    <input type="text" class="form-control" name="possess_permit_fee">
                </div>

                 <div class="form-group">
                    <label>Construction Permit Fee</label>
                    <input type="text" class="form-control" name="construction_permit_fee">
                </div>

                 <div class="form-group">
                    <label>License Fee</label>
                    <input type="text" class="form-control" name="license_fee">
                </div>

              
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'AMATEUR CLUB RADIO STATION LICENSE (MODIFICATION)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>
                <div class="form-group">
                    <label>Modification Fee</label>
                    <input type="text" class="form-control" name="modification_fee">
                </div>
            
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'RSL SIMPLEX (MODIFICATION)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>
                <div class="form-group">
                    <label>Modification Fee</label>
                    <input type="text" class="form-control" name="modification_fee">
                </div>
            
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'RSL REPEATER (MODIFICATION)') {

                document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>
                <div class="form-group">
                    <label>Modification Fee</label>
                    <input type="text" class="form-control" name="modification_fee">
                </div>
            
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;
            } if (selected === 'PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER') {

                 document.getElementById("demo").innerHTML = '';
                document.getElementById("services").innerHTML = `

                <div class="form-group">
                    <label>Filing Fee</label>
                    <input type="text" class="form-control" name="filing_fee">
                </div>

                 <div class="form-group">
                    <label>Purchase Permit Fee</label>
                    <input type="text" class="form-control" name="purchase_permit_fee">
                </div>

                <div class="form-group">
                    <label>Possess Permit Fee</label>
                    <input type="text" class="form-control" name="possess_permit_fee">
                </div>

                 <div class="form-group">
                    <label>Sell/Transfer Fee</label>
                    <input type="text" class="form-control" name="sell_transfer_fee">
                </div>
 
                 <div class="form-group">
                    <label>DST Fee</label>
                    <input type="text" class="form-control" name="dst_fee">
                </div>
            
                `;

            }
        }
    </script>  --}}
 