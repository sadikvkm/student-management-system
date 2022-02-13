<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', trans('forms.subject-name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('forms.subject-name'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div> @endif
    </div>
</div>