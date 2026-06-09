<template>
	<div id="content" class="content">
	<!-- begin breadcrumb -->
		<h1 class="page-header">Carrier Assessment</h1>
		<div class="row">
			<div class="col-md-12">
				 <div class="panel panel-default" >
				 	 <div class="panel-heading">
			         <h4 class="panel-title">New Carrier Assesment</h4>
			         <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			         </div>
			      </div>
				<div class="panel-body bg-default" style="background-color: #B3B6B7">
				        <div class="col-xl-3 col-md-6">
				        <div class="widget widget-stats" style="background-color: #D0D3D4">
				          <div class="stats-icon">
				             <div class="icon-img">
				             </div>
				          </div>
				          <div class="stats-info">
				             <h4 style="color:#000;">AMOUNT</h4>
				             <p data-value="" class="text-danger">&#8369;  {{ totalAmount }}</p>
				             <!-- <small>OR NO: </small> -->
				          </div>
				          <div class="stats-link">
				          </div>
				        </div>
				        </div>
				      </div>
			      	<div class="panel-body">
				      		<div class="row">
						      	<div class="col-md-6">
						      		<div class="form-group">
						      			<label>Company Name</label>
						      			<input type="text" class="form-control" v-model="applicant">
					      			</div>
					      		</div>
					      		<div class="col-md-6">
					      			<div class="form-group">
						      			<label>SOA #</label>
						      			<input type="text" class="form-control" v-model="soa_number">
					      			</div>
					      		</div>
					      		<div class="col-md-6">
					      			<div class="form-group">
					      				<label>Address</label>
					      				<input type="text" class="form-control" v-model="address">
					      			</div>
					      		</div>
					      		<div class="col-md-6">
					      			<div class="form-group">
					      				<label>Class Station</label>
					      				<input type="text"  class="form-control" v-model="class_station">
					      			</div>
					      		</div>
				      			<div class="col-md-6">
				      				<div class="form-group">
					      				<label>Remarks</label>
					      				<input type="text"  class="form-control" v-model="remarks">
				      				</div>
				      			</div>
				      			<div class="col-md-6">
				      				<div class="form-group">
				      					<label>Due Date</label>
				      					<input type="date" name="" v-model="due_date" class="form-control">
				      				</div>
				      			</div>
				      		</div>
							  <button @click.prevent="addItem" class="btn btn-success"><i class="fa fa-plus"></i> Add More</button>
							 <!--  <br> Amount: {{ totalAmount }} -->
							 <div>
							 	&nbsp;
							 </div>
							  <div class="row" v-for="(item, i) in items">
							    <div class="col-md-6">
							      <div class="form-group">
							      		<select v-model="item.description" class="form-control">
							      			<!-- <option>RSL</option> -->
							      			<option>FILING FEE</option>
							      			<option>DST</option>
							      			<option>SUF</option>
							      			<option>SUF WDN</option>
							      			<option>SUF MW</option>
							      			<option>SUF BWA</option>
							      			<option>IF</option>
							      			<option>SURCHARGE</option>
							      			<option>STORAGE</option>
							      			<option>DUP</option>
							      			<option>SURCHARGE (RSL)</option>
							      			<option>SURCHARGE (SUF)</option>
							      			<option>SRF</option>
							      			<option>BIDDING DOCS</option>
							      			<option>AUTHORIZATION FEE</option> 
							      			<option>CP</option>
							      			<option>PUR</option>
							      			<option>POS</option>
							      			<option>FF/AF</option>
							      			<option>MOD</option> 
							      			<option>DEMO</option> 
							      			<option>ADMIN FEE</option> 
							      			<option>LICENSE FEE</option>  
							      		</select>
									 
									<!-- 	<span>Selected: {{ selected }}</span> -->
							        <!-- <input type="text" class="form-control" v-model="item.description" placeholder="Description"> -->
							      </div>
							    </div>
							    <div class="col-md-6">
							      <div class="form-group">
							        <input type="text" class="form-control" placeholder="Amount" v-model="item.amount">
							      </div>
							    </div>
					  		</div>
					  		<div class="form-group">
						  		<button type="submit" @click.prevent="onSubmit" :disabled="btnProceed" class="btn btn-primary btn-block">Proceed</button>
					  	   </div>
					  </div>
					</div>
				</div>
			</div>
	</div>

</template>
<script>
 	export default {
 		data() {
 			return {
 				 items: [],
 				 applicant: '',
 				 soa_number: '',
 				 address: '',
 				 class_station: '',
 				 remarks: '',
 				 due_date: '',
 				 // amount: '',
 				 btnProceed: true,


 			}
 		},

		computed: {
		    totalAmount() {
		        return this.items.reduce((total, item) => {
		          return total + Number(item.amount);
		        }, 0);
		      },
		 },

	  created() {
	    this.addItem();
	  },

	  methods: {
	  	addItem() {
	  	 this.btnProceed = false
		 this.items.push({
	        description: null,
	        amount: 0,
	      });
	  	},
	  	onSubmit() {
	  		this.btnProceed = true
	  		axios.post(`/carriers`, { 
					applicant: this.applicant,
					soa_number: this.soa_number, 
					address: this.address, 
					class_station: this.class_station, 
					remarks: this.remarks, 
					due_date: this.due_date, 
					// amount: this.amount, 
					items: this.items 
	  			})
	             .then(response => {
	                //this.message = ''
	                this.applicant = '',
	                this.soa_number = '',
	                this.address = '',
	                this.class_station = '',
	                this.remarks = '',
	                this.due_date = '',
	                this.items = [],
	                //this.items.push(response.data)
	                this.btnProceed = true
	              //console.log(response.data);
           })
	  	}
	  }
 	}
</script>



 