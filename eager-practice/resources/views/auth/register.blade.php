<x-layouts.app>

    <h2>User Registration</h2>
    @if(session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif


    <form method="POST" action="/register">
        @csrf

        <x-input
            label="name"
            name="name"
            required />

        <x-input
            label="Email"
            name="email"
            type="email"
            required />

        <x-input
            label="Password"
            name="password"
            type="password"
            required />


        <div style="margin-bottom:15px;">

            <label>Gender</label><br>

            <input
                type="radio"
                name="gender"
                value="male"
                @checked(old('gender')=='male' )>
            Male

            <input
                type="radio"
                name="gender"
                value="female"
                @checked(old('gender')=='female' )>
            Female

            <input
                type="radio"
                name="gender"
                value="other"
                @checked(old('gender')=='other' )>
            Other

            @error('gender')
            <div style="color:red;">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div style="margin-bottom:15px;">

            <label>Hobbies</label><br>

            <input
                type="checkbox"
                name="hobbies[]"
                value="coding"
                @checked(is_array(old('hobbies')) && in_array('coding', old('hobbies')))>
            Coding

            <input
                type="checkbox"
                name="hobbies[]"
                value="gaming"
                @checked(is_array(old('hobbies')) && in_array('gaming', old('hobbies')))>
            Gaming

            <input
                type="checkbox"
                name="hobbies[]"
                value="music"
                @checked(is_array(old('hobbies')) && in_array('music', old('hobbies')))>  
            Music

        </div>

        <div style="margin-bottom:15px;">

            <label>Address</label>

            <textarea
                name="address"
                rows="4"
                cols="40">{{ old('address') }}</textarea>

            @error('address')
            <div style="color:red;">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div style="margin-bottom:15px;">

            <label>Country</label>

            <select name="country">

                <option value="">Select Country</option>

                <option
                    value="india"
                    @selected(old('country')=='india' )>
                    India
                </option>

                <option
                    value="usa"
                    @selected(old('country')=='usa' )>
                    USA
                </option>

                <option
                    value="uk"
                    @selected(old('country')=='uk' )>
                    UK
                </option>

            </select>

            @error('country')
            <div style="color:red;">
                {{ $message }}
            </div>
            @enderror

        </div>


        {{-- TERMS CHECKBOX --}}
        <div style="margin-bottom:15px;">

            <input
                type="checkbox"
                name="terms"
                value="1"
                @checked(old('terms'))>

            Accept Terms & Conditions

            @error('terms')
            <div style="color:red;">
                {{ $message }}
            </div>
            @enderror

        </div>


        <x-button type="success">
            Register
        </x-button>


    </form>

    @push('scripts')
    <script>
        console.log("Register page loaded");
    </script>
    @endpush

</x-layouts.app>