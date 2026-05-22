<div style="margin-bottom:10px;">

    <label>{{ $label }}</label>

    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        @required($required ?? false)
        @class([ 'border p-2 w-full'=> true,
    'border-red-500' => $errors->has($name)
    ])
    >

    @error($name)
    <div style="color:red;">{{ $message }}</div>
    @enderror

</div>