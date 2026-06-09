<td>Assessment {{ $activity->subject->name }} has been created by {{ $activity->causer->name }}, {{ $activity->created_at->diffForHumans() }}</td>
<td>
	@if (route('applicants.assesment', $activity->subject->id))
		<a href="{{ route('applicants.assesment', $activity->subject->id) }}" class="btn btn-xs btn-primary">Show</a>
	@endif
	{{-- <a href="{{ route('renew-assessment.assesment', $activity->subject->id) }}" class="btn btn-xs btn-default">View</a> --}}
</td>
 