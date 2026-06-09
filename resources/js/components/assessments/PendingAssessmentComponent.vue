<template>
<table class="table table-bordered" id="applicant-table">
	<thead>
		<tr>
			<th>ID</th>
			<th>SOA NO</th>
			<th>Applicant Company Name</th>
			<th>Address</th>
			<th>Status</th>
			<th>Options</th>
		</tr>
	</thead>
	 <tbody> 
	 </tbody>
</table>
</template>



  <script>
        export default {
        	data() {
 			return {
 				 assessments: []
 			}
 		},

 		mounted() {
	 			 Echo.private(`approval`)
	                .listen('Approval', (e) => {
	                $('#applicant-table').DataTable().ajax.reload(null, false)
                    new Audio('/notifications/test.mp3').play()

	            });
 			},
            created() {
                axios.get('/chief-engineer/api/home')
                	.then(response => this.assessments = response.data);
            }
        }
    </script>
