@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">
    {{--    trigger--}}

    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{--    links--}}

    <div x-show="show" class="absolute bg-gray-100 w-full pl-2 z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>

</div>
