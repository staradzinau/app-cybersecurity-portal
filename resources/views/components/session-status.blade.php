@if ($isNeedToRender())
    <div {{ $attributes->merge(['class' => 'font-medium text-green-600']) }}>
        {{ $getSessionStatusLabel() }}
    </div>
@endif
