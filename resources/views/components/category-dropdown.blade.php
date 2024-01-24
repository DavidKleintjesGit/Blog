<x-dropdown>
    <x-slot name="trigger">
        <button class="flex inline-flex w-20">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-down-arrow/>

        </button>
    </x-slot>
    <x-dropdown-item

        href="/posts?{{ http_build_query(request()->except('category', 'page')) }}" :active="!request('category')">
        All
    </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            href="/posts/?category={{ $category->slug }}{{ request('search') ? '&' . http_build_query(request()->except('category', 'page')) : '' }}"
            :active="request()->has('category') && request()->input('category') === $category->slug">
            {{ $category->name }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
