@props(['comment'])

<article class="flex mt-10 p-6 border rounded-xl bg-gray-200">
    <div class="flex-shrink-0">
        <img src="http://i.pravatar.cc/100?id= {{ $comment->user_id }}" class="rounded-xl pr-2">
    </div>
    <div>
        <header class="font-bold">
            <p class="font-bold">{{ $comment->user->username }}</p>
            <p class="font-bold">Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time></p>
        </header>
        <div>
            <p>
              {{ $comment->body }}
            </p>
        </div>
    </div>
</article>
