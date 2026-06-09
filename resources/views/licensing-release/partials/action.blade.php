


<div class="dropdown">
 
	<button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Actions

		<span class="caret"></span>
	</button>

	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

 
		<a href="/licensing-release/manage/{{ $licensingRelease->id }}" class="dropdown-item"><i class="fa fa-external-link"></i> Manage</a>
 

	   <a href="/licensing-release/{{ $licensingRelease->id }}/show" class="dropdown-item"> <i class="fa fa-eye"></i> Show Details</a>



	</div>

	 
{{-- <a href="{{ route('licensing-processing.edit', $licensingProcessing) }}" class="btn btn-primary btn-xs">Edit</a> --}}
{{-- <a href="javascript:void(0)"  data-id="{{ $licensingProcessing->id }} "  id="manage-licensing" class="btn btn-primary btn-xs">Manage</a> --}}


</div>




