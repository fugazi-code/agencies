<div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            @if(!$candidate)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">
                            OFW Reporting
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <label>Enter your code: </label>
                            <div class="d-flex flex-row">
                                <input class="form-control me-2" wire:model="code">
                                <button class="btn btn-primary h-100 m-0" wire:click="showDetails">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12"></div>
            @if($candidate)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="card-title text-white">
                                OFW Reporting
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-end">
                                            <label class="m-0 my-auto">Name</label>
                                        </div>
                                        <div class="col-md-auto"><strong>{{ $candidate['first_name'] }}</strong></div>
                                    </div>
                                </div>
                                <div class="col-md-12 border-bottom">
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-end">
                                            <label class="m-0 my-auto">Passport</label>
                                        </div>
                                        <div class="col-md-auto"><strong>{{ $candidate['passport'] }}</strong></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Remarks</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button class="btn btn-secondary me-2" wire:click="resetValues">Exit</button>
                            <button class="btn btn-success" wire:click="resetValues">Submit</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
