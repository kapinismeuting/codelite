@extends('frontend.layouts.app')

@section('title', __('We Create Software That Transform Companies'))

@section('content')
    @include('frontend.includes.hero')
    @include('frontend.includes.client')
    @include('frontend.includes.howwedo')
    @include('frontend.includes.servicearea')
    @include('frontend.includes.casestudio')
    @include('frontend.includes.about')
    @include('frontend.includes.testimonial')
    @include('frontend.includes.project')
    @include('frontend.includes.news')
    @include('frontend.includes.features')
    @include('frontend.includes.contact')
@endsection
