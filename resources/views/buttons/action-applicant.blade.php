<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{ route('applicant.form', ['candidate_id' => encrypt($candidateId)]) }}" type="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
    <a type="button" class="btn btn-info"><i class="fas fa-paperclip"></i></a>
</div>
