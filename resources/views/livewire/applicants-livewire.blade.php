<div>
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Applicants</h3>
                <x-a-button class="btn btn-success ml-3" href="{{ route('applicant.form') }}">
                    <i class="fas fa-plus"></i> Add Applicant
                </x-a-button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row mb-4 mx-2">
                    </div>
                </div>
                <div class="col-12">
                    <x-throwexceptions::gridjs :table="$applicantTable" name="tableApplicant"/>
                </div>
            </div>
        </div>
    </div>
</div>
