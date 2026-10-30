<button {{ $attributes->merge(['style' => 'font-size: 24px']) }}>
    Test button
</button>
@isset($first)
    <p>{{ $first }}</p>
@else
    <p>First not set</p>
@endisset
@isset($second)
    <p>{{ $second }}</p>
@endisset
