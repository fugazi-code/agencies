<div>
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Agencies</h3>
                <x-a-button class="btn btn-success ml-3">
                    <x-slot name="others">
                        data-toggle="modal" data-target="#agencyModal" wire:click="$set('details', [])"
                    </x-slot>
                    <i class="fas fa-plus"></i> Add Agency
                </x-a-button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row mb-4 mx-2">
                    </div>
                </div>
                <div class="col-12">
                    <livewire:agency-table/>
                </div>
            </div>
        </div>
    </div>
    {{--Add--}}
    <x-modalform id="agencyModal" modalTitle="New Agency" size="modal-lg">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Name</label>
                <x-input type="text" model="details.name"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>POEA</label>
                <x-input type="text" model="details.poea"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>CR No.</label>
                <x-input type="text" model="details.cr_no"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>Status</label>
                <x-select model="details.status">
                    <option value="active">Active</option>
                    <option value="blocked">Blocked</option>
                </x-select>
            </div>
            <div class="col-md-12 mb-2">
                <label>Address</label>
                <x-textarea model="details.address"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>Logo Upload</label>
                <x-input type="file" model="details.photo"/>
            </div>
            <div class="col-md-12 mb-2">
                <x-errors/>
            </div>
        </div>
        <x-slot name="button">
            <button type="button" class="btn btn-primary" wire:click="store">Save changes</button>
        </x-slot>
    </x-modalform>
    {{--Edit--}}
    <x-modalform id="agencyEditModal" modalTitle="New Agency" size="modal-lg">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Name</label>
                <x-input type="text" model="details.name"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>POEA</label>
                <x-input type="text" model="details.poea"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>CR No.</label>
                <x-input type="text" model="details.cr_no"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>Status</label>
                <x-select model="details.status">
                    <option value="active">Active</option>
                    <option value="blocked">Blocked</option>
                </x-select>
            </div>
            <div class="col-md-12 mb-2">
                <label>Address</label>
                <x-textarea model="details.address"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>Logo Upload</label>
                <x-input type="file" model="details.photo"/>
            </div>
            <div class="col-md-6 mb-2">
                <label>Preview</label>
                <img src="{{ Storage::url($details['logo_path']) ?? '' }}" class="img-fluid">
            </div>
            <div class="col-md-12 mb-2">
                <x-errors/>
            </div>
        </div>
        <x-slot name="button">
            <button type="button" class="btn btn-info" wire:click="edit">Update</button>
            <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
        </x-slot>
    </x-modalform>
</div>
