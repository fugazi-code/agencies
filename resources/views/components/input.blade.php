<div>
    <input type="{{ $type ?? 'text' }}"
           class="{{ isset($type) ? ($type == 'file' ? 'form-input' :'form-control') : 'form-control' }}"
           wire:model="{{ $model }}">
</div>
