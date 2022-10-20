<div>
    <select class="form-select" wire:model="{{ $model }}">
        <option value="">-- Select --</option>
        {{ $slot }}
    </select>
</div>
