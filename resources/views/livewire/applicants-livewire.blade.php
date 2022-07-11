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
                <div class="col-12" wire:ignore>
                    <x-throwexceptions::gridjs :table="$applicantTable" name="tableApplicant"/>
                </div>
            </div>
        </div>
    </div>
    <x-modalform id="statusModal" modal-title="Status of {{ $details['fullname'] ?? '' }}">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Enter a Status</label>
                <input type="text" class="form-control" wire:model="status">
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-12 mb-3">
                <h6>Statuses</h6>
                <ul class="list-group">
                    @isset($this->details['tags'])
                        @foreach($this->details['tags'] as $value)
                            <li class="list-group-item d-flex justify-content-between">
                                <label>{{ $value['name']['en'] }}</label>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash" wire:click="detach('{{ $value['name']['en'] }}')"></i>
                                </a>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
        <x-slot name="button">
            <a href="#" class="btn btn-primary" wire:click="addStatus">Save Status</a>
        </x-slot>
    </x-modalform>
</div>
