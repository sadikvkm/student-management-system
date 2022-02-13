@extends('layouts.admin')
@section('title', trans('pages.marks'))
@section('content')
@component('components.header-action-section', [
    'actionButtons' => [
        ['name' => trans('forms.add-marks'), 'url' => url('/admin/marks/create'), 'icon' => 'fas fa-plus'],
    ],
])
@endcomponent
<x-pageContainer>
    <x-dataTable 
        id="marks-datatable"
        scriptUrl="{{asset('/modules/marks/datatable.js')}}"
        :headers="[
            ['label' => trans('pages.dataTable.default.sl_no'), 'width' => '50px'],
            ['label' => trans('pages.dataTable.marks.name')],
            ['label' => trans('pages.dataTable.marks.maths')],
            ['label' => trans('pages.dataTable.marks.science')],
            ['label' => trans('pages.dataTable.marks.history')],
            ['label' => trans('pages.dataTable.marks.terms')],
            ['label' => trans('pages.dataTable.marks.total')],
            ['label' => trans('pages.dataTable.default.created_by')],
            ['label' => trans('pages.dataTable.default.created_at')],
            ['label' => trans('pages.dataTable.default.status')],
            ['label' => trans('pages.dataTable.default.actions')],
        ]"
    />
</x-pageContainer>
@endsection