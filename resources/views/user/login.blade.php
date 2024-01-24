@extends('components.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <h1>Login</h1>

        <form method="POST" action="/login">

            @csrf

            <label for="username">Username</label>

            <input class=""
                   type="text"
                   name="username"
                   id="username"
                   value="{{ old('username') }}"
                   required
            >

            @error('username')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="password">Password</label>

            <input class=""
                   type="password"
                   name="password"
                   id="password"
                   required
            >

            <button type="submit">Login</button>

        </form>
    </main>

@endsection
