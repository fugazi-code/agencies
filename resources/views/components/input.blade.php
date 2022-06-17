<div>
    <input type="{{ $type ?? 'text' }}" class="{{ $type == 'file' ? 'form-input' : 'form-control' }}" wire:model="{{ $model }}">
</div>
