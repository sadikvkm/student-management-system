<table class="table w-100" id="{{$id}}">
    <thead>
        <tr>
            @foreach ($headers as $item)
                <th>{{$item['label']}}</th>
            @endforeach
        </tr>
    </thead>
</table>

<x-actionConfirmModal
    id="data-table-delete-modal"
    actionAttribute=".delete-action-confirm"
    actionConfirmButtonlabel="Delete"
    defaultMesage="{{trans('messages.default-delete-confirm')}}"
    description=""
    center
    apiMethod="DELETE"
    reRenderDataTableId="{{$id}}"
    primaryButtonLayout="danger"
/>

<x-actionConfirmModal
    id="change-status-modal"
    actionAttribute=".change-table-status"
    actionConfirmButtonlabel="Confirm"
    defaultMesage="{{trans('messages.default-confirm-status')}}"
    description=""
    apiMethod="PUT"
    center
    reRenderDataTableId="{{$id}}"
    primaryButtonLayout="danger"
/>

@push('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@isset($scriptUrl)
    <script src="{{$scriptUrl}}"></script>
@endisset
@endpush

@push('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush