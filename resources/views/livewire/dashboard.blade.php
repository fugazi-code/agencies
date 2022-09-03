<div>
    <div class="container mt-5">
        <div class="card p-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h2>Hi {{ auth()->user()->with(['information'])->first()['information']['name'] }}, Welcome
                            Back!</h2>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
