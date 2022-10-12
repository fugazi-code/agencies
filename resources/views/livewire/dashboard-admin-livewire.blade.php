<div>
    <style>
        .timeline-block:hover {
            background-color: yellow;
        }

    </style>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Urgent Rescue</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ \App\Models\Rescue::all()->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-tower-broadcast text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column">
                <label for="exampleDataList" class="form-label">Search Overseas Filipino Worker</label>
                <input class="form-control" id="exampleDataList" placeholder="Type to search..."
                       wire:keydown.debounce="searchCandidate" wire:model="keyword">
                @if($results && $keyIn)
                    <div style="position: relative;">
                        <div class="d-flex flex-column bg-white border position-absolute w-100 mx-auto z-index-3">
                            @foreach($results as $item)
                                <div class="timeline timeline-one-side ">
                                    <div class="timeline-block mb-3 py-2 px-3"
                                         wire:click="bindSearch({{ $item['id'] }}, '{{ $item['last_name'] }}, {{ $item['first_name'] }}')">
                                    <span class="timeline-step">
                                                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                                    </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                {{ $item['last_name'] }}, {{ $item['first_name'] }}
                                            </h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                Agency: {{ $item['agency']['name'] ?? 'Not Assigned' }} <br>
                                                Passport: {{ $item['passport'] ?? 'Not Assigned' }}<br>
                                                National ID: {{ $item['iqama'] ?? 'Not Assigned' }}<br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($this->candidate)
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 d-flex flex-column border">
                        <label>Full Name</label>
                        <p>{{ $this->candidate['last_name'] }}, {{ $this->candidate['first_name'] }}</p>
                    </div>
                    <div class="col-md-3 d-flex flex-column border">
                        <label>Passport</label>
                        <p>{{ $this->candidate['passport'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
