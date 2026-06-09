    <template>

     <button type="submit" @click.prevent="onSubmit" class="btn btn-block btn-primary"><i class="fa fa-arrow-right"  aria-hidden="true"></i> Proceed</button> 
        
        
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
            axios.patch('/assesments-status/' + this.assessment.id, { 
                status: this.status,
            }) 
             .then(response => {
                this.status = '',
                window.location.href = '/applicants'
           })
        }
      }
    }
</script>