@extends('layouts.admin')
@section('title', trans('pages.teachers'))
@section('content')
@component('components.header-action-section', [
    'actionButtons' => [
        ['name' => trans('forms.add-teacher'), 'url' => url('/admin/teachers/create'), 'icon' => 'fas fa-plus'],
    ],
])
@endcomponent
<x-pageContainer>
    <x-dataTable 
        id="teacher-datatable"
        scriptUrl="{{asset('/modules/teachers/datatable.js')}}"
        :headers="[
            ['label' => trans('pages.dataTable.default.sl_no'), 'width' => '50px'],
            ['label' => trans('pages.dataTable.teachers.name')],
            ['label' => trans('pages.dataTable.teachers.email')],
            ['label' => trans('pages.dataTable.default.created_by')],
            ['label' => trans('pages.dataTable.default.created_at')],
            ['label' => trans('pages.dataTable.default.status')],
            ['label' => trans('pages.dataTable.default.actions')],
        ]"
    />
</x-pageContainer>
@endsection