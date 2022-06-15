<div>
    <select class="form-control" wire:model="{{ $model }}">
        <option value="">-- Select --</option>
        {{ $slot }}
    </select>
</div>
