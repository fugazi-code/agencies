<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#{{ $modal }}"
            wire:click="$emit('{{ $listener }}', {{ $id }})">
        <i class="fas fa-pencil"></i>
    </button>
    <button type="button" class="btn btn-danger"data-toggle="modal"
            data-target="#{{ $modal }}"
            wire:click="$emit('{{ $listener }}', {{ $id }})">
        <i class="fas fa-trash"></i>
    </button>
</div>
