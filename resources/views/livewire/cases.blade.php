<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cases</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Cases</h6>
    @endpush
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Cases</h3>
                <a href="{{ route('complaint-form-livewire', ['agencyId' => 1]) }}" class="btn btn-outline-info ms-3"
                   target="_blank">
                    Complaint Form
                </a>
            </div>
            <div class="row">
                <div class="col-12">
                    <livewire:complains-table/>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="caseDetailModal" tabindex="-1" aria-labelledby="caseDetailModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="caseDetailModalLabel">Case Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($detail)
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row justify-content-center">
                                @if($detail['image1'])
                                    <a href="{{ $detail['image1'] }}" class="btn btn-sm btn-info mx-2" target="_blank">
                                        Image 1
                                    </a>
                                @endif
                                @if($detail['image2'])
                                    <a href="{{ $detail['image2'] }}" class="btn btn-sm btn-info mx-2" target="_blank">
                                        Image 2
                                    </a>
                                @endif
                                @if($detail['image3'])
                                    <a href="{{ $detail['image3'] }}" class="btn btn-sm btn-info mx-2" target="_blank">
                                        Image 3
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-12 border-top">
                                Complaint
                                <p>
                                    {!! $detail['complaint'] !!}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
