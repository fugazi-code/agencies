<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Vouchers</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Deployments</h6>
    @endpush
    <livewire:toaster />
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Deployments</h3>
            </div>
            <livewire:deployments-table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deployModal" tabindex="-1" aria-labelledby="deployModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deployModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label>Type</label>
                            <select class="form-select" wire:model='detail.type'>
                                <option value="">-- Select Option --</option>
                                <option value="ex-abroad">Ex-Abroad</option>
                                <option value="first-timer">First-Timer</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label>PPT</label>
                            <input type="text" class="form-control" wire:model='detail.ppt'>
                        </div>
                        <div class="col-12">
                            <label>Age</label>
                            <input type="number" class="form-control" wire:model='detail.age'>
                        </div>
                        <div class="col-12">
                            <label>Fit to Work</label>
                            <input type="text" class="form-control" wire:model='detail.fit'>
                        </div>
                        <div class="col-12">
                            <label>Contract Signing</label>
                            <input type="text" class="form-control" wire:model='detail.contract_signing'>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='store'>Save</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('deployModal'), {
                keyboard: false
            })

            window.addEventListener('deploy-modal', event => {
                myModal.toggle();
            });
        </script>
    @endpush
</div>
