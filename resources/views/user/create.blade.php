@extends('components.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <h1>Register</h1>

        <form method="POST" action="/register">

            @csrf

            <label for="name">Name</label>

            <input class=""
                   type="text"
                   name="name"
                   id="name"
                   value="{{ old('name') }}"
                   required
            >

            @error('name')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

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

            @error('password')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="email">email</label>

            <input class=""
                   type="email"
                   name="email"
                    id="email"
                   value="{{ old('email') }}"
                   required
            >

            @error('email')
            <p class="text-red-500 text-ms mt-1"> {{$message}}</p>
            @enderror

            <button type="submit">Register</button>

        </form>
    </main>

@endsection
