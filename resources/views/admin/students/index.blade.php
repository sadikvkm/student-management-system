@extends('layouts.admin')
@section('title', trans('pages.students'))
@section('content')
@component('components.header-action-section', [
    'actionButtons' => [
        ['name' => trans('forms.add-students'), 'url' => url('/admin/students/create'), 'icon' => 'fas fa-plus'],
    ],
])
@endcomponent
<x-pageContainer>
    <x-dataTable 
        id="students-datatable"
        scriptUrl="{{asset('/modules/students/datatable.js')}}"
        :headers="[
            ['label' => trans('pages.dataTable.default.sl_no'), 'width' => '50px'],
            ['label' => trans('pages.dataTable.students.name')],
            ['label' => trans('pages.dataTable.students.email')],
            ['label' => trans('pages.dataTable.students.age')],
            ['label' => trans('pages.dataTable.students.gender')],
            ['label' => trans('pages.dataTable.students.assigned_teacher')],
            ['label' => trans('pages.dataTable.default.created_by')],
            ['label' => trans('pages.dataTable.default.created_at')],
            ['label' => trans('pages.dataTable.default.status')],
            ['label' => trans('pages.dataTable.default.actions')],
        ]"
    />
</x-pageContainer>
@endsection