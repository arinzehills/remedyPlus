@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} style=""
 {!! $attributes->merge(['class' => 'rounded-xl shadow-lg border-blue-600 h-8
    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
