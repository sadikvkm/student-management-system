@extends('layouts.admin')
@section('title', trans('pages.marks-edit'))
@section('content')
<x-pageContainer col="6">
    <x-form 
        path="admin.marks._form"
        :action="['marks.update', $id]"
        method="PUT"
        :data="$result"
        :subjects="$subjects"
        :students="$students"
        :terms="$terms"
        disableClientValidation
    />
</x-pageContainer>
@endsection