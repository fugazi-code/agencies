<div>
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Vouchers</h3>
                <a href="#" class="btn btn-success ml-3" data-toggle="modal" data-target="#voucherModal">
                    <i class="fas fa-plus"></i> Add Voucher
                </a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row mb-4 mx-2">
                    </div>
                </div>
                <div class="col-12">
                    <livewire:vouchers-table/>
                </div>
            </div>
        </div>
    </div>
</div>
