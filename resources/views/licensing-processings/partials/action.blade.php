


<div class="dropdown">
 
	<button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Actions

		<span class="caret"></span>
	</button>

	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

 
		<a href="{{ route('licensing-processing.edit', $licensingProcessing) }}" class="dropdown-item"><i class="fa fa-external-link"></i> Edit</a>

	   <a href="{{ route('licensing-processing.manage', $licensingProcessing) }}" class="dropdown-item"> <i class="fa fa-pencil"></i> Process Details</a>
	   <a href="{{ route('licensing-processing.manageLicenseForRelease', $licensingProcessing) }}" class="dropdown-item"> <i class="fa fa-bar-chart"></i> Manage Releasing</a>
	
	   <a href="{{ route('licensing-processing.show', $licensingProcessing) }}" class="dropdown-item"> <i class="fa fa-eye"></i> Show Details</a>



	</div>

	 
{{-- <a href="{{ route('licensing-processing.edit', $licensingProcessing) }}" class="btn btn-primary btn-xs">Edit</a> --}}
{{-- <a href="javascript:void(0)"  data-id="{{ $licensingProcessing->id }} "  id="manage-licensing" class="btn btn-primary btn-xs">Manage</a> --}}


</div>







