<td>{{ $activity->subject->latestAssessment->soa_no ?? '' }} has been created by {{ $activity->causer->name }}, {{ $activity->created_at->diffForHumans() }}</td>
{{-- <td>{{ $activity->subject->applicant_company }}</td> --}}
<td>
	<a href="{{ url('applicants', $activity->subject->id ?? '') }}" class="btn btn-xs btn-primary">Show</a>
</td>
{{-- <td>{{ $activity->subject->soa_no }}</td>
<td>{{ $activity->description }}</td> --}}
<td></td>