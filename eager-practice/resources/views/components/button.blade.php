<button
    @class([
        'px-4 py-2 text-white' => true,
        'bg-green-500' => $type === 'success',
        'bg-red-500' => $type === 'danger',
    ])
    @disabled($disabled ?? false)
>
    {{ $slot }}
</button>
