
@if (auth()->user()->isAdmin() || auth()->user()->isAccessor())
    <a href="/assessments/{{ $assessment->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Manage Assessment</a>
@elseif (auth()->user()->isCashier())
    <a href="/cashier/{{ $assessment->id }}/applicant-assessments" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Manage </a>
@endif
