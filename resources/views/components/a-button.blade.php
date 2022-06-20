
<a href="{{ $href ?? '#' }}" class="{{ $class ?? 'btn btn-success' }}" {{ $others ?? '' }}
        @isset($click) wire:click="{{ $click }}" @endisset>
    {{ $slot }}
</a>
