<x-authentication>
    <h1>Register</h1>
    {{-- cek eror --}}
    {{-- @if ($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </div>
        @endif --}}
    <form action="/register" method="POST">
        @csrf
    
        <input type="text" name="name" placeholder="Name"/>
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="password_confirmation" placeholder="Password Confirmation"/>
    
        <button type="submit">Register</button>
    </form>
</x-authentication>