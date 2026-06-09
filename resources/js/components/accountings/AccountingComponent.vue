    <template>
   <div id="content" class="content">
          <ol class="breadcrumb float-xl-right">
          </ol>
       <div class="panel panel-default">
          <div class="panel-heading">
             <h4 class="panel-title">Pending Applicant</h4>
             <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
             </div>
          </div>
          <div class="table table-responsive">
             <div class="panel-body">
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
                   <tbody >
                   </tbody>
                </table>
             </div>
          </div>
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
             Echo.private(`approval-sent`)
                   .listen('ApprovalSent', (e) => {
                     $('#applicant-table').DataTable().ajax.reload(null, false)
                     new Audio('/notifications/pending.mp3').play()
               });
         },
            created() {
                axios.get('/accounting/api/home')
                  .then(response => this.assessments = response.data);
            }
        }
    </script>
