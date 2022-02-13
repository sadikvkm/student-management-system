@extends('layouts.admin')
@section('title', trans('pages.teachers-edit'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.teachers._form"
        :action="['teachers.update', $id]"
        method="PUT"
        :data="$result"
        disableClientValidation
    />
</x-pageContainer>
@endsection