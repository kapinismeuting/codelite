<button {{ $attributes->merge(['class' => 'btn btn-primary']) }} type="{{ $type }}">
    {{ $slot }}
</button>