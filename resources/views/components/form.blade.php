@php
    $formId = (isset($id)) ? $id : 'form-'. rand();
    $buttonName = "Submit";
@endphp

@if($method === 'POST')
    {!! Form::open(['route' => $action, 'autocomplete' => 'off', 'id' => $formId]) !!}
@elseif ($method === 'PUT')
    @php $buttonName = "Update"; @endphp
    {!! Form::model($data, ['method' => 'PUT', 'route' => $action, 'id' => $formId ]) !!}
@endif
@include($path)
<div class="row mt-2">
    <div class="col-md-12 text-right">
        <x-button label="{{$buttonName}}" small type="submit" />
    </div>
</div>
{!! Form::close() !!}
<x-select2Script />
@push('scripts')
    @if(!isset($disableClientValidation))
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <script>

            let formSet = $('#{{$formId}}').serializeArray();
            let validationRules = {};
            for (let i = 0; i < formSet.length; i++) {
                const el = formSet[i];
                let getElementProp = "";
                try {
                    getElementProp = $('[name='+el.name+']')
                } catch (error) {
                    getElementProp = $('[name="'+el.name+']"')
                }
                let isRequired = getElementProp.attr('required');
                let maximumLength = getElementProp.attr('maxlength');
                let minimumLength = getElementProp.attr('minlength');
                let validationType = getElementProp.attr('validation-type');
                isRequired = isRequired ? true : false;

                validationRules[el.name] = {required: isRequired}

                if(validationType)
                    validationRules[el.name]['number'] = true;

                if(maximumLength)
                    validationRules[el.name]['maxlength'] = Number(maximumLength);

                if(minimumLength)
                    validationRules[el.name]['minlength'] = Number(minimumLength);

            }

            $("#{{$formId}}").validate({
                rules: validationRules
            });

            console.log(validationRules)


        </script>
    @endif
@endpush