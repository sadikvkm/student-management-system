@extends('layouts.admin')
@section('title', trans('pages.teacher-edit'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.subjects._form"
        :action="['subjects.update', $id]"
        method="PUT"
        :data="$result"
        disableClientValidation
    />
</x-pageContainer>
@endsection