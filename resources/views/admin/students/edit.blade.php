@extends('layouts.admin')
@section('title', trans('pages.students-edit'))
@section('content')
<x-pageContainer col="4">
    <x-form 
        path="admin.students._form"
        :action="['students.update', $id]"
        method="PUT"
        :data="$result"
        :gender="$gender"
        :teachers="$assignedTeacher"
        disableClientValidation
    />
</x-pageContainer>
@endsection