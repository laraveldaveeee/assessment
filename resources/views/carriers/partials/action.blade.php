<a href="/carrier/{{ $carrier->id }}/show" class="btn btn-primary btn-xs">Show details</a>
<form method="POST" action="{{ route('carrier', $carrier) }}" style="display: inline-block;">
	@csrf
	{{ method_field('DELETE') }}
	<button type="submit" class="btn btn-danger btn-xs">Delete</button>
</form>

