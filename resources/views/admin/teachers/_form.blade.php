<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', trans('forms.name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('forms.name'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('name')) <div class="text-danger">{{ $errors->first('name') }}</div> @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('email', trans('forms.email')) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('forms.email'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('email')) <div class="text-danger">{{ $errors->first('email') }}</div> @endif
    </div>
</div>
