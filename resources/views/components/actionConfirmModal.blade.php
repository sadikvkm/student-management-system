<?php 

    $id = $id;

?>

<x-modal id="{{$id}}" title="{{trans('messages.confirm-popup-title')}}">
    <div class="row mt-2">
        <div class="col-md-12 {{ isset($center) ? 'text-center' : '' }}">
            @if (isset($defaultMesage))
                <h5>{{ $defaultMesage }}</h5>
            @endif
            @if (isset($description))
                <div>{{ $description }}</div>
            @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-right">
            <x-modalActions class="btn btn-sm btn-primary" id="{{$id}}-submit"
                buttonLayout="{{ isset($primaryButtonLayout) ? $primaryButtonLayout : 'primary' }}"
                label="{{ $actionConfirmButtonlabel }}" />
        </div>
    </div>
</x-modal>
@push('scripts')
    <script>
        var dataTableReRender = "";
    </script>
    @if (isset($reRenderDataTableId))
        <script>
            dataTableReRender = "{{ $reRenderDataTableId }}";
        </script>
    @endif
    <script>
        $(document).on('click', '{{ $actionAttribute }}', function() {
            let href = $(this).data('href');
            let method = $(this).data('method');
            $('#{{$id}}').modal('show');
            $('#{{$id}}-submit').attr('request-href', href);
            $('#{{$id}}-submit').attr('request-method', method);
        })

        $(document).on('click', '#{{$id}}-submit', function() {
            appRequest($('#{{$id}}-submit').attr('request-href'), '', $('#{{$id}}-submit').attr('request-method'))
                .then(res => {
                    if (dataTableReRender)
                        $('#' + dataTableReRender).DataTable().draw();
                    $('#{{$id}}').modal('hide');
                    $('#{{$id}}-submit').attr('request-href', "");
                    appNotify({message: res.message});
                })

        })
    </script>
@endpush
