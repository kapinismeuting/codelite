@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to Image Library')
            <div class="py-4">
                <livewire:backend.image-library />
            </div>
        </x-slot>
    </x-backend.card>

@endsection
