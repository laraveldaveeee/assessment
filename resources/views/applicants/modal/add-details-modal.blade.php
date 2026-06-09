<div class="modal fade" id="ajax-details-modal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="assessmentFeeModal"></h4>
         </div>

         <div class="modal-body">
            <form id="applicantForm" class="form-horizontal">
               <input type="hidden" name="applicantId" id="applicantId">

               <div class="form-group">
                  <label>Notes</label>
                {{--   <textarea  type="text" name="notes" class="form-control"></textarea> --}}
                   {{--   <textarea id="myeditorinstance" name="myeditorinstance"> </textarea> --}}
              {{--       <textarea class="tinymce-editor" name="notes">
                   
 
                    </textarea> --}}
        {{--             <input id="x" placeholder="Editor content goes here" type="hidden" name="notes">
                     <trix-editor input="x"></trix-editor> --}}

                    {{--  <input id="x" placeholder="Editor content goes here" type="hidden" name="notes">
                        <div class="editor">
                           <input type="text" hidden="" name="notes">
                        </div> --}}{{-- 
                        <textarea type="text" name="notes"></textarea> --}}
               </div>

                <div class="form-group">
                         <input id="x"  type="hidden" name="notes"  value="{!! $assessment->applicant->notes!!}">
                        <trix-editor input="x" placeholder="Body" value=""> </trix-editor>
                    </div>

               <div class="form-group">
                  <label>Due Date</label>
                  <input type="date" name="due_date" class="form-control" id="due_date" value="{{ Carbon\Carbon::parse($assessment->applicant->due_date) }}">
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="btn-update">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


@push ('scripts')

    <link href="{{ asset('css/trix.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/trix.js') }}"></script>


{{--  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });
 </script> --}}



{{-- <script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });
</script> --}}

{{-- <script src="https://cdn.tiny.cloud/1/3i0eq1mp9zj991tx41q1hr5xehio4ysoye470syuiugljhcn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

 <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 100,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script> --}}
</script>
@endpush