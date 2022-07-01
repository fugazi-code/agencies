<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{ route('applicant.form', ['candidate_id' => encrypt($candidateId)]) }}" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>
    <a href="{{ route('applicant-docs-livewire', ['candidate_id' => encrypt($candidateId)]) }}" class="btn btn-info">
        <i class="fas fa-paperclip"></i>
    </a>
</div>
