<div>
    <style>
        .timeline-block:hover {
            background-color: yellow;
        }

        .alert.alert-danger {
            animation-name: alertify !important;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        /* The animation code */
        @keyframes alertify {
            0% {
                box-shadow: 0px 0px 6px 0px red;
            }
            50% {
                box-shadow: 0px 0px 20px 19px red;
            }
            100% {
                box-shadow: 0px 0px 6px 0px red;
            }
        }
    </style>
    <div class="row mb-4">
        <div class="col-md-12">
            @if($this->rescueCount)
            <div class="alert alert-danger d-flex justify-content-center">
            <span class="text-white font-weight-bold">
                URGENT RESCUE!
            </span>
                <button data-bs-toggle="modal" data-bs-target="#urgentModal" wire:click="showRecues"
                        class="btn btn-link ms-2 p-0 my-0 text-info">Show Details
                </button>
            </div>
            @endif
        <!-- Modal -->
            <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mapModalLabel">Map Location</h5>
                            <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div wire:ignore id='map2' style='width: 100%; height: 300px;'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="urgentModal" tabindex="-1" aria-labelledby="urgentModalLabel"
                 aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="urgentModalLabel">Urgent Responses</h5>
                            <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach($this->recues as $item)
                                    <div class="col-12 border">
                                        <div class="row">
                                            <div class="col-6">
                                                OFW Name
                                            </div>
                                            <div class="col-6 font-weight-bold">
                                                {{ $item['candidate']['last_name'] }},
                                                {{ $item['candidate']['first_name'] }}
                                            </div>
                                            <div class="col-6">
                                                Passport
                                            </div>
                                            <div class="col-6 font-weight-bold">
                                                {{ $item['candidate']['passport'] }}
                                            </div>
                                            <div class="col-6">
                                                IP Address
                                            </div>
                                            <div class="col-6 font-weight-bold">
                                                {{ $item['ip_address'] }}
                                            </div>
                                            <div class="col-6">
                                                Location
                                            </div>
                                            <div class="col-6 font-weight-bold">
                                                lat: {{ $item['actual_latitude'] }}
                                                long: {{ $item['actual_longitude'] }}
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#mapModal"
                                                            onclick="showPosition({{ $item['actual_latitude'] }}, {{ $item['actual_longitude'] }})">
                                                        Locate
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Reports</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $reportCount }}
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Cases</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $casesCount }}
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Agencies</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $agencyCount }}
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
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet'/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('rescue-channel');
        channel.bind('broadcast-alert-system', function(data) {
            @this.render()
        });

        mapboxgl.accessToken =
            'pk.eyJ1IjoicmVuaWVyLXRyZW51ZWxhIiwiYSI6ImNrZHhya2l3aTE3OG0ycnBpOWxlYjV3czUifQ.4hVvT7_fiVshoSa9P3uAew';

        $('#cb-btn').on('click', function () {
            $('.loading').removeAttr('hidden', 'hidden');
        });

        function showPosition(latitude, longitude) {
            var map2 = new mapboxgl.Map({
                container: 'map2',
                center: [longitude, latitude],
                zoom: 15,
                style: 'mapbox://styles/mapbox/satellite-streets-v10'
            });

            var marker2 = new mapboxgl.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map2);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    swal.fire({
                        html: '<img src="/images/owwa.png" width="120"/><img src="/images/dfa.png" width="120"/><img src="/images/polo.png" width="120"/>' +
                            '<div class="swal2-header" style=\'margin-top:5px; box-sizing: border-box; display: flex; flex-direction: column; align-items: center; padding: 0px 1.8em; -webkit-tap-highlight-color: transparent; color: rgb(33, 37, 41); font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\'>\n' +
                            '    <h2 class="swal2-title" style="box-sizing: border-box; margin: 0px 0px 0.4em; font-weight: 600; font-size: 1.875em; position: relative; max-width: 100%; padding: 0px; color: rgb(89, 89, 89); text-align: center; text-transform: none; overflow-wrap: break-word; -webkit-tap-highlight-color: transparent; display: block; line-height: 1;">GPS Required<br><span style="font-size: 26px;"><em>(GPS ay kailangan)</em></span></h2>\n' +
                            '</div>\n' +
                            '<div class="swal2-content" style=\'box-sizing: border-box; z-index: 1; justify-content: center; margin: 0px; padding: 0px 1.6em; color: rgb(84, 84, 84); font-size: 1.125em; font-weight: 400; line-height: normal; text-align: center; overflow-wrap: break-word; -webkit-tap-highlight-color: transparent; font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\'>\n' +
                            '    <div class="swal2-html-container" style="box-sizing: border-box; -webkit-tap-highlight-color: transparent; display: block;">Please enable the GPS locator to continue<br style="box-sizing: border-box;"><i style="box-sizing: border-box;">Maari lamang buksan ang GPS upang magpatuloy</i></div>\n' +
                            '</div>',
                        focusConfirm: false,
                        confirmButtonText: 'GPS has been enabled!<br><i>Bukas na ang GPS!</i>',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location = window.location
                        }
                    });
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

    </script>
</div>
