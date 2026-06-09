<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;
class Stats extends Model
{
	public function totalUsers()
	{
		return User::count(); 
	}

	public function totalServices()
	{
		return ServiceTemplate::count();
	}

	public function totalAssessments()
	{
		return Assessment::count();
	}	

	public function assessmentServices()
	{
		return AssessmentService::count();
	}	
	public function totalServiceFees()
	{
		return ServiceFee::count();
	}
	public function totalFees()
	{
		return FeeTemplate::count();
	}

	public function totalApplicants() 
	{
		return Applicant::count();
	}

	public function totalLicenses()
	{
		return LicensingProcessing::count();
	}

	public function totalProcessors() 
	{
		return ProcessorLicensing::count();
	}

	public function counts()
	{
		if (auth()->user()->isCashier()) {
		 return Assessment::withCount(['applicant'])
		 					->where('status', 'For Payment')
		 					->count();
		}		
		if (auth()->user()->isChiefEngineer()) {
		 return Assessment::withCount(['applicant'])
		 					->where('status', 'Pending')
		 					->count();
		}
		if (auth()->user()->isAdmin() || auth()->user()->isAccessor()) {
			return Assessment::withCount(['applicant'])
							->where('status', 'Verified')
							->count();
		}
		if (auth()->user()->isAccounting()) {
			return Assessment::withCount(['applicant'])
							->where('status', 'Approved')
							->count();
		}
	}
}