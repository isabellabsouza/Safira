@props(['value'])

<label {{ $attributes->merge(['class' => 'col-2 col-form-label']) }}>
    {{ $value ?? $slot }}
</label>
