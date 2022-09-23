<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
    @endpush
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h4>Hi {{ auth()->user()->email }}, Welcome Back!</h4>
                    </div>
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="alert alert-light d-flex flex-row" role="alert">
                                        <div class="me-2">
                                            <div class="spinner-grow text-warning" role="status">
                                            </div>
                                        </div>
                                        <div class="font-weight-bold my-auto">
                                            100 OFW does not report ove 30days.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-light d-flex flex-row" role="alert">
                                        <div class="me-2">
                                            <div class="spinner-grow text-danger" role="status">
                                            </div>
                                        </div>
                                        <div class="font-weight-bold my-auto">
                                            105 High Priority Concern.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
