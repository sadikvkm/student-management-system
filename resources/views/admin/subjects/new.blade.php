@extends('layouts.admin')
@section('title', trans('pages.subject-new'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.subjects._form"
        :action="['subjects.store']"
        method="POST"
        disableClientValidation
    />
</x-pageContainer>
@endsection