@props(['active' => false])

<?php

$classes = 'block text-left text-sm hover:bg-blue-500 hover:text-white py-1 ';

if ($active) $classes .= 'bg-blue-500 text-white';

?>

<a {{ $attributes(['class' => $classes]) }}
>{{ $slot }}</a>
