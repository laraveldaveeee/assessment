 {{-- <div class="dropdown">
<button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Assessment
<span class="caret"></span>
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   <a href="{{ route('applicants.assesment', $applicant->latestAssessment->id) }}" class="dropdown-item"><i class="fa fa-external-link"></i> New Assessment</a> 
   <a href="{{ route('renew-assessment.showRenewAssessment', $applicant->latestAssessment->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> Renew Assessment</a>
  
</div>
 --}}
<!-- Modal -->



{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="renew-form" method="POST" action="{{ route('renew-applicant.store', $applicant) }}">
               @csrf
               <h1 style="text-align: center;">Are you sure?</h1>
               <p style="text-align: center;">Do you want to NEW SOA-NO <b> {{ $applicant->applicant_company }} </b> ?</p>
               <div class="modal-footer" style="margin-bottom: -20px;">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
            </div>
         </div>
      </div>
   </div>
</div> --}}
{{-- 
 <a href="{{ route('renew-assessment.showRenewAssessment', $applicant->latestAssessment->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> Renew Assessment</a> --}}

{{-- @if ($applicant->latestAssessment->status == 'Paid')
   <div hidden=""><a href="javascript0:void(0)" id="edit-applicant" data-id="{{ $applicant->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a></div>
   @else  --}}
   <a href="javascript:void(0)" id="edit-applicant" data-id="{{ $applicant->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
{{-- @endif --}}

{{-- 
   @if ($applicant->latestAssessment->status == 'Paid')
      <a href="javascript;;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter">
      <i class="fa fa-pencil"></i> Assess</a>
   @endif
 
    @if ($applicant->latestAssessment->status == 'Verified' || $applicant->latestAssessment->status == 'Pending')
      <a href="/assessments/{{ $applicant->latestAssessment->id }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i>  Assess</a> 
    @endif
  --}}
<a href="{{ route('applicants.show', $applicant) }}" class="btn btn-warning btn-xs"><i class="fa fa-bar-chart"></i> Show</a>
{{-- <a href="/applicant/{{ $applicant->id }}" class="btn btn-danger btn-xs">Delete</a> --}}
{{--   <form method="POST" action="/applicant/{{ $applicant->id }}">
    {{ method_field('DELETE') }}
    @csrf
      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
  </form> --}}
{{--    @include ('applicants.modal.generate-soa')
  <a href="javascript;;" data-id="{{ $applicant->id }}" class="btn btn-xs btn-success" data-toggle="modal" data-target="#generateNewAssessmentwithSOA">Add Assessment</a> --}}

  @if (auth()->user()->isAdmin())
  <form method="POST" action="/applicant/{{ $applicant->id }}" style="display:inline-block;">
    {{ method_field('DELETE') }}
    @csrf
      <button type="submit" class="btn btn-danger btn-xs">Delete</button>
  </form>
@endif