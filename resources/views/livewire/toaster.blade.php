<div>
    <div class="toast" data-delay="10000" data-autohide="true" style="position: absolute;top: 12%;right: 2%;z-index: 100;">
        <div class="toast-header">
            <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect fill="#007aff" width="100%" height="100%" /></svg>
            <strong class="mr-auto">Message</strong>
            <small class="text-muted">now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
    <script>
        window.addEventListener('toaster-js', event => {
            $('.toast').toast('show');
            $('.modal').modal('hide')
        })
    </script>
</div>
