<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
    @endpush
    <div class="row mt-5">
            @can('agency')
                <div class="col-md-12">
                    <h5>Vouchers Summary</h5>
                    <div class="row p-2">
                        <div class="col-md-auto">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <div class="font-weight-bold">Total Vouchers</div>
                                        <div class="text-right">000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <livewire:dashboard-admin-livewire/>
            @endcan
        </div>
</div>
