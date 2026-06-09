<template>
<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Carrier Pending</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body ">
			<table class="table table-bordered " id="carriers-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>SOA NO</th>
						<th>Carrier Name</th>
						<th>Address</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
				</thead>
				 <tbody>
				 
				 	<tr v-for="assessment in assessments">
				 		<td>{{ assessment.id }}</td>
				 		<td>{{ assessment.soa_number }}</td>
				 		<td>{{ assessment.carrier.applicant }}</td>
				 		<td>{{ assessment.carrier.address }}</td>
				 		<td><span class="label label-primary">For Payment </span></td>
				 	<td>
						<a :href="'/cashier/' + assessment.id + '/carrier-assessments'" class="btn btn-outline-primary btn-xs">
						    <i class="fa fa-pencil"> </i>
						    <span>Manage</span>
						 </a>	
						<!--  <a :href="'/cashier/' + assessment.id + '/delete'" class="btn btn-outline-danger btn-xs">
						    <i class="fa fa-trash"></i>
						    <span></span>
						 </a> -->
				 	</td>
				 	</tr>
				 </tbody>
			</tbody>
			</table>
		</div>
	</div> 
</template>
   <script>
        export default {
        	data() {
 			return {
 				 assessments: []
 			}
 		},

 		mounted() {
	 			 Echo.private(`carrier-sent`)
	                .listen('CarrierSent', (e) => {
						this.assessments.push(e.assessment)
	            });
 			},
            created() {
                axios.get('/api/cashier/carrier-pendings')
                	.then(response => this.assessments = response.data);
            }
        }
    </script>

