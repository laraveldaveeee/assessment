<?php

 
use Carbon\Carbon;
use App\Applicant;


Route::get('/export/new-carriers', 'CarriersController@downloadNewCarriers')->name('export.new_carriers');

Route::get('/pdf-routing/{newCarrier}', 'PDFGeneratorsController@routingCarrier');
Route::get('/carrier/{newCarrier}/receipt', 'PDFGeneratorsController@carrierReceipt');


Route::post('/fees/{id}',  'AssessmentsController@patchFee');


Route::get('/test', function () {


      $applicants = Applicant::with(['assessments', 'latestAssessment'])
      						 
      						 ->count();

      return $applicants;
 	

});

// Route::get('test', function() {
// 	$assessments = \App\Assessment::all();
	
// 	foreach ($assessments as $assessment) {

// 		if ($value = $assessment->soa_no) {
// 			$pieces  = explode('-', $value);

// 	        $prefix = 'SOA';
// 	        $year    = $pieces[0];
// 	        $counter = $pieces[1];

// 	        // SOA-000189-21
// 	        $soa = $prefix . '-' . $counter . '-' . $year;

// 	        $assessment->update([
// 	        	'soa_prefix' => $prefix,
// 	        	'soa_no' => $counter . '-' . $year,
// 	        	'soa_year' => $year,
// 	        ]);
// 		}
// 	}
// });
// use App\Assessment;
	//Auth Login

	Route::get('/tests', function () {
		return view('welcome');
	});
	Route::delete('/applicant/assessments/{assessment}', 'CheifEnginnerDashboard@destroy');
	// Route::delete('/applicant/{applicant}', 'ApplicantsController@destroy');
	Route::get('/monthly-report/export', 'MonthlyReportsController@export')->name('monthly-report/export');
	Route::get('/pdf-generate/{assessment}', 'PDFGeneratorsController@index');
	Route::get('/pdf-generate-cashier/{assessment}', 'PDFGeneratorsController@generateOP');
	Route::get('/pdf-generate-receipt/{assessment}', 'PDFGeneratorsController@receipt');
	Route::get('/pdf-generate/carrier/{assessment}', 'PDFGeneratorsController@printCarrier');


	Route::get('pdf-generate/new-carrier/{newCarrier}', 'PDFGeneratorsController@printNewCarrier');
	//Route::get('pdf-generate-cashier/{newCarrier}', 'PDFGeneratorsController@test');
	Route::get('pdf-generate-filter-reports/{newCarrier}', 'PDFGeneratorsController@filtering');


	Route::get('/ajax-surcharge-fee/{fee}', 'RenewalAssessmentsController@getSurcharge');
	Route::put('/ajax-surcharge-fee/{surchargeFee}', 'RenewalAssessmentsController@addSurcharge');

	Route::get('/ajax-details/{applicant}', 'RenewalAssessmentsController@getDetails');
	Route::patch('/ajax-detail/{applicant}', 'RenewalAssessmentsController@updateApplicant');


	Route::get('/application-for-leave', 'ApplicationsController@index');
	Route::post('/applications', 'ApplicationsController@store');
	Route::get('/pending-application-for-leave', 'ApplicationsController@pending');
	Route::get('/pending-application-for-leave/{application}/manage', 'ApplicationsController@manage');
	Route::patch('/pending-application-for-leave/{application}', 'ApplicationsController@update');

	Route::get('/confirmed-application-for-leave-application-for-leave', 'ApplicationsController@confirmed');
	Route::get('/confirmed-application-for-leave/{application}/manage', 'ApplicationsController@manageApplication');

	Route::patch('/confirmed-application-for-leave/{application}/approved', 'ApplicationsController@updateApplication');
	Route::patch('/confirmed-application-for-leave/{application}/cancelled', 'ApplicationsController@cancelledApplication');
	Route::get('/pdf/printing/{application}', 'ApplicationsController@printing');
	//PDF ROUTING GENERATE
	Route::get('/pdf-generate-routing/{assessment}', 'PDFGeneratorsController@routing');

	//Filter reports PDF
	Route::get('/filtering-carrier-reports', 'PDFGeneratorsController@filtering')->name('filtering-carrier-reports');

	Route::get('/new-carrier', 'CarriersController@newCarrier')->name('new-carrier');
	Route::post('/new-carrier', 'CarriersController@newCarrierStore');
	Route::get('/new-carrier/{newCarrier}/show', 'CarriersController@showNewCarrier')->name('carriers.new-carrier-assessment');
	Route::patch('/new-carrier/{newCarrier}', 'CarriersController@updateNewCarrier');
	Route::patch('/new-carrier/{newCarrier}/update', 'CarriersController@updateStatus');
	Route::delete('/new-carrier/{newCarrier}', 'CarriersController@destroyNewCarrier');
	//Filtering view 
	Route::get('/filter-new-carrier', 'CarriersController@filtering');
	//Route::get('/filter-carrier',  'CarriersController@search');


	Route::get('/ajax-update-fee/{fee}', 'AssessmentsController@getFee');
	Route::put('/ajax-update-fee/{updateFee}', 'AssessmentsController@updateFee');
//Renewal Store
Route::post('/renewal-assessments/{assessment}', 'RenewalAssessmentsController@store')->name('renewal-assessments.store');

// Route::('/', function () {
// 	return view('auth.login');
// })
Route::group(['middleware' => 'prevent-back-history'], function() {
	Route::get('/', function () {
		if (auth()->check() && auth()->user()->role->name == 'administrator') 
		{
			  $users = \App\User::all();
			  return view('home', compact('users'));
		}
		if (auth()->check() && auth()->user()->role->name == 'chief engineer')
		{

			return view('cheif-engineer-dashboard.index');
		}		
		if (auth()->check() && auth()->user()->role->name == 'assessor')
		{
			 return view('applicants.index');
		}
		if (auth()->check() && auth()->user()->role->name == 'accounting') 
		{
			return view('accounting-dashboard.index');
		}
		if (auth()->check() && auth()->user()->role->name == 'cashier') 
		{
			return view('cashier-dashboard.index');
		}
	    return view('auth.login');
	});	
	Auth::routes();
	Route::group(['middleware' => 'auth'], function(){
		Route::middleware('role:administrator')->group(function () {
				//Home
				Route::get('/home', 'HomeController@index')->name('home');
				//Admin Can Delete applicants
				Route::delete('/applicant/{applicant}', 'ApplicantsController@destroy');

				//Administrator
				Route::get('/administrators', 'AdministratorController@index');
				Route::post('/administrators', 'AdministratorController@store')->name('administrators');
				Route::get('/administrators/{administrator}/edit', 'AdministratorController@edit')->name('administrators.edit');
				Route::patch('/administrators/{administrator}', 'AdministratorController@update')->name('administrators.update');
				//Processor
				Route::get('/processors', 'ProcessorsController@index');
				Route::post('/processors', 'ProcessorsController@store')->name('processors');
				Route::get('/processors/{processor}/edit', 'ProcessorsController@edit')->name('processors.edit');
				Route::patch('/processors/{processor}', 'ProcessorsController@update')->name('processors.update');

				//Employees
				Route::get('/employees', 'EmployeesController@index')->name('employees');
				//chief-engineers
				Route::get('/chief-engineers', 'ChiefEngineerController@index')->name('chief-engineers');
				Route::post('/chief-engineers', 'ChiefEngineerController@store')->name('chief-engineers.store');
				Route::get('/chief-engineers/{chiefEngineer}/edit', 'ChiefEngineerController@edit')->name('chief-engineers.edit');
				Route::patch('/chief-engineers/{chiefEngineer}', 'ChiefEngineerController@update')->name('chief-engineers.update');
				//Services
				Route::get('/services', 'ServicesController@index')->name('services.index');
				Route::post('/services', 'ServicesController@store')->name('services');
				Route::get('/services/{service}/edit', 'ServicesController@edit')->name('services.edit');
				Route::patch('/services/{service}/edit', 'ServicesController@update')->name('services.update');
				Route::get('/services/{service}/show', 'ServicesController@show')->name('services.show');
				//SUF Rates
				Route::get('/suf-rates', 'SufRatesController@index')->name('suf-rates');
				Route::post('/suf-rates', 'SufRatesController@store');
				Route::get('/suf-rates/{sufRate}/edit', 'SufRatesController@edit');
				Route::patch('/suf-rates/{sufRate}', 'SufRatesController@update');
				Route::get('/suf-rates/{sufRate}/show', 'SufRatesController@show');
				//Accounting
				// Route::get('/accountings', 'AccountingController@index')->name('accountings');
				// Route::post('/accounting', 'AccountingController@store')->name('accountings.store');
				// Route::get('/accountings/{user}', 'AccountingController@edit')->name('accounting.edit');
				// Route::patch('/accountings/{user}', 'AccountingController@update')->name('accounting.update');
				Route::get('/logs-history', 'LogsHistoryController@index');


				//ROC PROCESS

				Route::get('/processing/roc', 'ProcessRocController@index');
			
		
		});


		//Cheif Engineer Dashboard
		Route::middleware('role:chief engineer')->group(function (){
				
				Route::get('/chief-engineer/home', 'CheifEnginnerDashboard@index')->name('chief-engineer/home.index');
				Route::get('/chief-engineer/api/home', 'CheifEnginnerDashboard@apiCheifEngineer');
				Route::get('/applicant/assessments/{assessment}', 'CheifEnginnerDashboard@show');
				Route::patch('/applicant-assessments/{assessment}', 'CheifEnginnerDashboard@update');
				Route::patch('/applicant-assessments/{assessment}/disapproved', 'CheifEnginnerDashboard@disapproved');
				Route::post('/applicant-assessments/{assessment}/disapproved', 'CheifEnginnerDashboard@message');

		});
		//Cheif Engineer & Administrator
		Route::middleware('role:chief engineer,administrator')->group(function() {
			Route::get('/chief-engineers', 'ChiefEngineerController@index')->name('chief-engineers');
			Route::post('/chief-engineers', 'ChiefEngineerController@store')->name('chief-engineers.store');
			Route::get('/chief-engineers/{chiefEngineer}/edit', 'ChiefEngineerController@edit')->name('chief-engineers.edit');
			Route::patch('/chief-engineers/{chiefEngineer}', 'ChiefEngineerController@update')->name('chief-engineers.update');
		});
		//Assessor Dashboard
		Route::middleware('role:assessor')->group(function() {
			Route::get('/accessor/home', 'AccessorsDashboardController@index');
		});
		Route::middleware('role:assessor,administrator')->group(function() {
			//Assessors
			Route::get('/accessors', 'AccessorsController@index');
			Route::post('/accessors', 'AccessorsController@store')->name('accessors');
			Route::get('/accessors/{accessor}/edit', 'AccessorsController@edit')->name('accessors.edit');
			Route::patch('/accessors/{accessor}', 'AccessorsController@update')->name('accessors.update');

			Route::get('/service-with-fees', 'ServiceTemplateController@index')->name('service-with-fees');
			Route::get('/service-fees/{serviceTemplate}/show', 'ServiceTemplateController@show')->name('service-fees.show');
			Route::get('/service-fees/{serviceTemplate}/edit', 'ServiceTemplateController@edit');
			Route::patch('/service-fees/{serviceTemplate}', 'ServiceTemplateController@update');
			Route::post('/service-with-fees', 'ServiceTemplateController@store');
			Route::delete('/service-fees/{serviceTemplate}', 'ServiceTemplateController@destroy')->name('service-fees.destroy');

			Route::post('/fee-templates/{serviceTemplate}', 'ServiceFeesController@store')->name('fee-templates.store');
			Route::get('/fee-templates/{row}/edit', 'ServiceFeesController@edit')->name('fee-templates.edit');
			Route::patch('/fee-template/{row}', 'ServiceFeesController@update')->name('fee-template.update');
			Route::delete('/fee-templates/{row}', 'ServiceFeesController@destroy')->name('fee-templates.destroy');

			Route::get('/carriers', 'CarriersController@index');
			Route::get('/carriers', 'CarriersController@index');
			Route::post('/carriers', 'CarriersController@store');

			//Carrier Lists
			Route::get('/carrier-lists', 'CarriersController@carriers')->name('carrier-lists.carriers'); 
			Route::delete('/carrier/{carrier}', 'CarriersController@destroy')->name('carrier'); 
			Route::get('/carrier/{carrier}/show', 'CarriersController@showDetails');


			Route::delete('/assessments/{assessment}/delete', 'ApplicantsController@removeAssessment');
		});
		//Assessors & Administrator
		Route::middleware('role:assessor,administrator')->group(function () {
			Route::post('/assessments/{assessment}', 'AssessmentsController@store')->name('assessments.store');
			Route::get('/assessments/{assessment}', 'AssessmentsController@show')->name('applicants.assesment');
			Route::patch('/assesments-status/{assessment}', 'AssessmentsController@updateStatus')->name('applicants.index');
			Route::delete('/assessments/serviceFee/{fee}', 'AssessmentsController@destroyFee');
			//Ajax
			Route::get('/ajax-assessments/{serviceTemplate}', 'AssessmentsController@editAssessment');
			//Ajax 
			Route::put('/ajax-assessments/{assessmentService}', 'AssessmentsController@updateAssessment');
			Route::get('/assessments-delete/{assessment}', 'AssessmentsController@deleteAssessment');
			Route::get('/renew-assessment/{assessment}', 'RenewalAssessmentsController@index')->name('renew-assessment.showRenewAssessment');
			// New Generate
			Route::post('/applicants/{applicant}/new-generate', 'AssessmentsController@generateNewAssessment');
			//Applicant Company Name
			Route::resource('/applicants', 'ApplicantsController');
			Route::get('/soa-or-details', 'ApplicantsController@details')->name('soa-or-details.details');
			Route::get('/create/applicant', 'ApplicantsController@createApplicant'); //Create Applicant
			Route::post('update-applicants/{id}', 'ApplicantsController@updateApplicant');
			Route::post('/update-assessment', 'AssessmentsController@update')->name('updateAssessment');
			Route::get('/applicant-details/{assessment}', 'AssessmentsController@showAssessment')->name('showAssessment');
			//Renewal
			Route::post('/duplicate-assessments', 'RenewalAssessmentsController@duplicateAssessment')->name('duplicate-assessments.store');
			Route::get('/applicant-details/duplicate/{assessment}', 'RenewalAssessmentsController@showDuplicate')->name('showDuplicate');
			Route::get('/applicant-details/show-copy-assessment/{assessment}', 'RenewalAssessmentsController@showCopy');


		});

		Route::middleware('role:cashier,administrator')->group(function () {
			//Cashier
			Route::get('/cashiers', 'CashiersController@index');
			Route::post('/cashiers', 'CashiersController@store')->name('cashiers');
			Route::get('/cashiers/{cashier}/edit', 'CashiersController@edit')->name('cashiers.edit');
			Route::patch('/cashiers/{cashier}', 'CashiersController@update')->name('cashiers.update');
		});

		//Cashier Dashboard
		Route::middleware('role:cashier')->group(function () {
			Route::get('/cashier/home', 'CashiersDashboardController@index')->name('cashier/home.index');
			Route::get('/cashier/api/home', 'CashiersDashboardController@cashierApi');
			//Applicant Lists
			Route::get('/cashier/applicant-list', 'CashiersDashboardController@applicants')->name('cashier/applicant-list');
			Route::get('/cashier/show/applicant-assessments/{applicant}', 'CashiersDashboardController@showApplicantDetails');
			Route::get('/cashier/applicant/assessment-details/{assessment}', 'CashiersDashboardController@showApplicantAssessment');
			Route::get('/cashier/{assessment}/applicant-assessments', 'CashiersDashboardController@show');
			// Route::get('/cashier/{assessment}', 'CashiersDashboardController@editOr');
			Route::patch('/cashier/applicant-assessments/{assessment}', 'CashiersDashboardController@update');
			Route::patch('/back-to-assessor/{assessment}', 'CashiersDashboardController@backToAssessor');
			Route::get('/cashier/carrier-pendings', 'CashiersDashboardController@carrier');
			Route::get('/api/cashier/carrier-pendings', 'CashiersDashboardController@carrierApi');

			Route::get('/cashier/new-carrier-lists', 'CashiersDashboardController@newCarrierLists')->name('cashier.new-carrier-list.newCarrierLists');


			Route::get('/carrier/{newCarrier}/show-assessments', 'CashiersDashboardController@newCarrierManage');
			Route::patch('/new-carrier-assessments/{newCarrier}', 'CashiersDashboardController@newCarrierUpdate');



			Route::get('/cashier/carrier-list', 'CashiersDashboardController@carrierLists')->name('cashier.carrier-list.carrierLists');
			Route::get('/cashier/{assessment}/carrier-assessments', 'CashiersDashboardController@manageCarrier');

			Route::patch('/cashier/carrier-assessments/{assessment}', 'CashiersDashboardController@updateCarrierOR');
			Route::get('/cashier/{carrier}/show-assessments', 'CashiersDashboardController@showCarrierAssessment');

			Route::get('/cashier/pendings', 'CashiersDashboardController@newCarriersPending')->name('cashier.pendings');

			Route::delete('/cashier/{applicant}', 'CashiersDashboardController@destroy');

			//Monthly Reports
			Route::get('/monthly-report', 'MonthlyReportsController@index');


		});

		//Accountant Dashboard
		Route::middleware('role:accounting')->group(function () {
			Route::get('/accounting/home', 'AccountingDashboardController@index')->name('accounting/home.index');
			Route::get('/accounting/api/home', 'AccountingDashboardController@apiAccounting');
			Route::get('/accounting/{assessment}/applicant-assessments', 'AccountingDashboardController@show');
			Route::patch('/accounting/applicant-assessments/{assessment}', 'AccountingDashboardController@update');
		});

		//Account & Administrator
		Route::middleware('role:accounting,administrator')->group(function () {
			Route::get('/accounting', 'AccountingController@index')->name('accountings');
			Route::post('/accounting', 'AccountingController@store')->name('accountings.store');
			Route::get('/accountings/{accounting}/edit', 'AccountingController@edit')->name('accountings.edit');	
			Route::patch('/accountings/{accounting}', 'AccountingController@updateAccounting')->name('accountings.update');	
		});

		Route::middleware('role:administrator,admin aide')->group(function () {
			Route::get('/admin-aide/home', 'AdminAideDashboardController@index');
			///admin-aide
			Route::resource('/admin-aide', 'AdminAideController');			
			//Licensing for Processing
			Route::get('/licensing-processing', 'LicensingProcessingControllers@index')->name('licensing-processing');
			Route::post('/licensing-processing', 'LicensingProcessingControllers@store')->name('licensing-processing');
			Route::get('/licensing-processing/{licensingProcessing}/edit', 'LicensingProcessingControllers@edit')->name('licensing-processing.edit');
			Route::patch('/licensing-processing/update/{licensingProcessing}', 'LicensingProcessingControllers@update');
			Route::get('/licensing-processing/{licensingProcessing}/manage', 'LicensingProcessingControllers@manage')->name('licensing-processing.manage');
			Route::patch('/licensing-processing/{licensingProcessing}', 'LicensingProcessingControllers@updateLicense')->name('licensing-processing.updateLicense');
			Route::get('/licensing-processing/{licensingProcessing}/manage-releasing', 'LicensingProcessingControllers@manageLicenseForRelease')->name('licensing-processing.manageLicenseForRelease');
			Route::patch('/licensing-processing/update-release/{licensingProcessing}', 'LicensingProcessingControllers@updateLicenseForRelease')->name('licensing-processing.updateLicenseForRelease');
			Route::get('/licensing-processing/{licensingProcessing}/show', 'LicensingProcessingControllers@show')->name('licensing-processing.show');
			//Route::post('licensing-processing/{id}', 'LicensingProcessingControllers@updateLicensing');
			//Licensing for Releasing
			Route::get('/licensing-release', 'LicensingReleasingController@index')->name('licensing-release');
			Route::get('/licensing-release/manage/{licensingRelease}', 'LicensingReleasingController@manage');
			Route::patch('/licensing-release/{licensingRelease}', 'LicensingReleasingController@update');
			Route::get('/licensing-release/{licensingRelease}/show', 'LicensingReleasingController@show');
			//Processors Licensing
			Route::get('/processors-licensing', 'ProcessorsLicensingController@index');
			Route::post('/processors-licensing', 'ProcessorsLicensingController@store');
			Route::get('/processors-licensing/{processorsLicense}/show-details', 'ProcessorsLicensingController@show');
		});

		//Administrator, Assessor, Cashier, Accounting & Chief Engineer
		Route::middleware('role:administrator,assessor,cashier,accounting,chief engineer')->group(function () {
			//Route::get('/pdf-generate/{assessment}', 'GeneratePDFController@index');
			// Route::get('/pdf/{assessment}', 'GeneratePDFController@generatePdfOp');
			// Route::get('/pdf-generate/{assessment}', 'PDFGeneratorsController@index');
		});
 
		//Adminsitrator, Assessor, Processor, ChiefEngineer, Accounting, Cashier
		Route::middleware('role:administrator,assessor,processor,chief engineer,accounting,cashier')->group(function () {
			Route::get('/settings', 'SettingsController@index')->name('settings');
			Route::patch('/settings', 'SettingsController@update');
			Route::get('/users', 'UsersController@index')->name('users');
			Route::get('/view/profile/{user}', 'UsersController@show');
			Route::get('/view-notifications', 'NotificationsController@viewNotification')->name('view-notifications');
		});
			Route::get('ajax-select/getService/{id}', 'AssessmentsController@getServices');
			Route::get('ajax-select/getServiceAndSuf/{id}', 'AssessmentsController@getServicesAndSuf');

			//Route::get('ajax-select/getServiceSuf/{id}', 'AssessmentsController@getServiceSuf');
	});
});
 
