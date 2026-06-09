<template>
      <button type="submit"  @click.prevent="onSubmit" class="btn btn-sm btn-green m-b-10"><i class="fa fa-check"></i> Approved</button>
</template>
<script>
	export default {
	  props: ['assessment'],
	  data() {
	    return {
	      status: ""
	    };
	  },
	  methods: {
	    onSubmit: function () {
	    	axios.patch('/applicant-assessments/' + this.assessment.id, { 
				status: this.status,
  			})
             .then(response => {
             	this.status = '',
				window.location.href = '/chief-engineer/home'
           })
	    }
	  }
	}
</script>

