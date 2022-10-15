<div>
    @push('breadcrumbs')
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Rescues</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Rescues</h6>
    @endpush
    <livewire:toaster/>
    <div class="card mt-5">
       <div class="card-body">
           <div class="card-title mb-4 d-flex flex-row">
               <h3>Rescues</h3>
               <a href="{{ route('rescue') }}" class="btn btn-info">Rescue Page</a>
               <button class="btn btn-outline-info ms-2" data-bs-toggle="modal" data-bs-target="#fraModal">
                   <i class="fas fa-building-circle-arrow-right"></i> F.R.A.
               </button>
           </div>
           <livewire:rescue-table/>
       </div>
    </div>
</div>
