<button {{ $attributes->merge(['class' => 'btn btn-secondary']) }} type="{{ $type }}">
    {{ $slot }}
</button>