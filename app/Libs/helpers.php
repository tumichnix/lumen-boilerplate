<?php

if (! function_exists('get_array')) {
    function get_array($value): array
    {
        if (is_array($value)) {
            return $value;
        }
        if ($value instanceof \Illuminate\Contracts\Support\Arrayable) {
            return $value->toArray();
        }

        return [];
    }
}
