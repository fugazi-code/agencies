<div>
    <style>
        .timeline-block:hover {
            background-color: yellow;
        }

    </style>
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
                                                Agency: {{ $item['agency']['name'] ?? 'Not Assigned' }}
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
