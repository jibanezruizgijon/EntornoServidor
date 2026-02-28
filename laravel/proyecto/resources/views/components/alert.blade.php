@props(['type' => 'info']) 
 
@php
    switch ($type) {
        case 'info':
            $class = 'text-blue-800 bg-blue-100 rounded-lg';
            break;
            case 'danger':
            $class = 'text-red-800 bg-red-100 rounded-lg';
            break;
            case 'success':
            $class = 'text-green-800 bg-green-100 rounded-lg';
            break;
            case 'warning':
            $class = 'text-yellow-800 bg-yellow-100 rounded-lg';
            break;
            case 'dark':
            $class = 'text-gray-800 bg-gray-100 rounded-lg';
            break;
        
        default:
            $class = 'text-gray-800 bg-gray-100 rounded-lg';
            break;
    }
@endphp

