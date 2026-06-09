<a href="/service-fees/{{ $serviceTemplate->id }}/show" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Manage Service Fee</a>
<a href="/service-fees/{{ $serviceTemplate->id }}/edit" class="btn btn-primary btn-xs">Edit</a>
	<form method="POST" action="{{ route('service-fees.destroy', $serviceTemplate) }}" style="display: inline-block;">
		@csrf
		{{ method_field('DELETE') }}
		<button class="btn btn-danger btn-xs">Delete</button>
	</form>