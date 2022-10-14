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
           <livewire:rescue-table/>
       </div>
    </div>
</div>
