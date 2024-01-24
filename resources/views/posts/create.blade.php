@extends('components.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <h1>Write a post</h1>

        <form method="POST" action="/admin/post/store" enctype="multipart/form-data">
            @csrf

            <label for="name">title</label>

            <input class=""
                   type="text"
                   name="title"
                   id="title"
                   value="{{ old('name') }}"
                   required
            >

            @error('title')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="slug">slug</label>

            <input class=""
                   type="text"
                   name="slug"
                   id="slug"
                   value="{{ old('name') }}"
                   required
            >

            @error('slug')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="thumbnail">thumbnail</label>

            <input class=""
                   type="file"
                   name="thumbnail"
                   id="thumbnail"
                   required
            >

            @error('thumbnail')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="description">description</label>

            <textarea class=""
                      name="description"
                      id="description"
                      required
            >{{ old('description') }}</textarea>

            @error('description')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <label for="body">body</label>

            <textarea class=""
                   name="body"
                   id="body"
                   required
            >{{ old('body') }}</textarea>

            @error('body')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <select name="category_id" id="category_id">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category') === $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>

            @error('body')
            <p class="text-red-500 text-ms mt-1"> {{$message}} </p>
            @enderror

            <button type="submit">Post</button>

        </form>
    </main>

@endsection
