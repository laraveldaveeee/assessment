@extends('layouts.app')
@section('content')

 <div id="content" class="content">
          
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Logs History</a></li>
                <li class="breadcrumb-item active">Logs History</li>
            </ol>
         
            <h1 class="page-header">Logs History <small></small></h1>
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Logs</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="activity-logs">
                            <thead>
                                {{-- <tr>
                                    <th>Causer</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr> --}}
                                <tbody>
                                    @foreach ($activities as $activity)
                                        @php
                                            // $data = json_decode($activity->changes);
                                            $path = class_basename(strtolower($activity->subject_type)) . '_' . $activity->description;
                                        @endphp
                                        <tr>
                                            @if (view()->exists("logs-history.activity.{$path}"))
                                                @include("logs-history.activity.{$path}")
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

{{-- <script>
    
     $('#activity-logs').DataTable({
            "ordering":'true',
            "order": [0, 'desc'],
            processing: true,
            serverSide: true,

            ajax: '{!! route('logs-history.index') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'soa_no'},
               

              
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
      });
</script> --}}

@endpush