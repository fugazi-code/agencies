<div>
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Users</h3>
                <a href="#" class="btn btn-success ml-3" data-toggle="modal" data-target="#userModal">
                    <i class="fas fa-plus"></i> Add User
                </a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row mb-4 mx-2">
                    </div>
                </div>
                <div class="col-12">
                    <livewire:user-table/>
                </div>
            </div>
        </div>
    </div>

    <x-modalform id="userModal" modalTitle="New User">
        <div class="row">
            <div>

            </div>
        </div>
        <x-slot name="button">
            <button type="button" class="btn btn-primary">Save changes</button>
        </x-slot>
    </x-modalform>
</div>
