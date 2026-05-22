<x-layouts.app1>
    <h2>Registration Form</h2>
    @if(session('success'))
    <x-alert type="success" : message="session('success')"
        @endif
        <form method="POST" action="/register">
        @csrf
        <x-input
            label="Name"
            name="name"
            required />
        <x-input
            label="Email"
            email="email"
            type="email"
            required />
        <x-input
            lable="Psassword"
            password="password"
            type="password"
            required />

        <x-button>
            type="success"
            Register
        </x-button>

        


        </form>

        @push('scripts')
        <script>
            console.log("Registration page loaded");
        </script>
        @endpush


</x-layouts.app1>