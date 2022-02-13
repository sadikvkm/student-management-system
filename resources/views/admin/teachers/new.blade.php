@extends('layouts.admin')
@section('title', trans('pages.subject-new'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.teachers._form"
        :action="['teachers.store']"
        method="POST"
        disableClientValidation
    />
</x-pageContainer>
@endsection