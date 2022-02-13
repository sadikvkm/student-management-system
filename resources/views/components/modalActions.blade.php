<div class="text-end mb-1">
    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal" aria-label="Close">Close</button>
    <button id="{{ isset($id) ? $id : rand() }}" class="{{isset($customSubmitButtonClass) ? $customSubmitButtonClass : ''}} btn btn-sm btn-{{ isset($buttonLayout) ? $buttonLayout : 'primary' }}"
        type="{{ isset($type) ? $type : 'button' }}">{{ isset($label) ? $label : 'Button' }}</button>
</div>
