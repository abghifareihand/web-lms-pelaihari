@extends('layouts.landing.main')
@section('container')
    <x-landing.beranda id="beranda"></x-landing.beranda>
    <x-landing.about id="about"></x-about>
    <x-landing.education id="education"></x-education>
    <x-landing.tools id="tools" :quizData="$quizData"></x-tools>
    <x-landing.galery id="galery" :galery="$galery"></x-galery>
    <x-landing.contact id="contact"></x-contact>
@endsection
