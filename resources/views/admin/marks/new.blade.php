@extends('layouts.admin')
@section('title', trans('pages.marks-new'))
@section('content')
<x-pageContainer col="6">
    <x-form 
        path="admin.marks._form"
        :action="['marks.store']"
        method="POST"
        disableClientValidation
        :subjects="$subjects"
        :students="$students"
        :terms="$terms"
        id="mark-form"
    />
</x-pageContainer>
@endsection