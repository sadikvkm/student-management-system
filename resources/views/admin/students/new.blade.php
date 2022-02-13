@extends('layouts.admin')
@section('title', trans('pages.subject-new'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.students._form"
        :action="['students.store']"
        method="POST"
        disableClientValidation
        :gender="$gender"
        :teachers="$assignedTeacher"
    />
</x-pageContainer>
@endsection