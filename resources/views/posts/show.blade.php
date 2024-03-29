@extends('components.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ ($post->thumbnail) ? asset('storage/' . $post->thumbnail) : '/images/illustration-1.png' }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->DiffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="/posts/?author={{$post->author->username}}">
                            <h5 class="font-bold">{{ $post->author->username }}</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/posts"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <a href="/posts/?category={{$post->category->slug}}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $post->category->name }}</a>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>
            </div>
            <section class="col-span-8 col-start-5">
                <div>
                    <form
                        class=""
                        method="POST"
                        action="/post/{{$post->slug}}/comments"
                    >
                        @csrf
                        <header class="flex items-center">
                            <img src="http://i.pravatar.cc/40?id= {{ auth()->id() }}" class="rounded-xl pr-2">
                            <h2>Write an inspiring comment!</h2>
                        </header>
                        <div>
                            <textarea placeholder="Write here..." name="body" class="w-full" required></textarea>
                        </div>
                        <div>
                            <button type="submit">Place comment</button>
                        </div>

                    </form>
                </div>
                @foreach($post->comments as $comment)
                    <x-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
    </section>
    </body>

@endsection
