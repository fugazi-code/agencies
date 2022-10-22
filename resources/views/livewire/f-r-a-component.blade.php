<div>
    <button class="btn btn-outline-info ms-2" data-bs-toggle="modal" data-bs-target="#fraModal">
        <i class="fas fa-building-circle-arrow-right"></i> F.R.A.
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="fraModal" tabindex="-1" aria-labelledby="fraModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fraModalLabel">
                        Foreign Recruitment Agencies
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                       aria-label="Agency username" aria-describedby="button-addon2"
                                       wire:model="fraKey">
                                <button class="btn btn-outline-success m-0" type="button" id="button-addon2"
                                        wire:click="addFRA">
                                    ADD
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($fra as $item)
                                    <li class="list-group-item d-flex flex-row justify-content-between">
                                        <div>{{ $item['agency_name'] }}</div>
                                        <button class="btn btn-sm btn-danger m-0" wire:click="deleteFRA({{ $item['id'] }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="jobOrderUpdate">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
