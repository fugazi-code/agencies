<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Rescues</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Rescues</h6>
    @endpush
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Rescues</h3>
                <a href="{{ route('rescue') }}" class="btn btn-outline-info ms-2">Rescue Page</a>
            </div>
            <livewire:rescue-table/>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <label>Status</label>
                                <select class="form-select" wire:model="respond.status">
                                    <option value="">Select Option</option>
                                    <option value="resolved">Resolved</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label>Please indicate below</label>
                                <textarea class="form-control" rows="8" wire:model="respond.feedback"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="submitFeedback">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
