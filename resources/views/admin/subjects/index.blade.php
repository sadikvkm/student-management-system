@extends('layouts.admin')
@section('title', trans('pages.subjects'))
@section('content')

<x-pageContainer>
    <x-dataTable 
        id="student-datatable"
        scriptUrl="{{asset('/modules/subjects/datatable.js')}}"
        :headers="[
            ['label' => trans('pages.dataTable.default.sl_no'), 'width' => '50px'],
            ['label' => trans('pages.dataTable.subjects.subjects')],
            ['label' => trans('pages.dataTable.default.created_by')],
            ['label' => trans('pages.dataTable.default.created_at')],
            ['label' => trans('pages.dataTable.default.status')],
            ['label' => trans('pages.dataTable.default.actions')],
        ]"
    />
</x-pageContainer>
@endsection