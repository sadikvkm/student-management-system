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
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('forms.email'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('email')) <div class="text-danger">{{ $errors->first('email') }}</div> @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('dob', trans('forms.dob')) !!}
        {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'placeholder' => trans('forms.dob'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('dob')) <div class="text-danger">{{ $errors->first('dob') }}</div> @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('gender', trans('forms.gender')) !!}
        {!! Form::select('gender', $gender, null, ['class' => 'form-control', 'placeholder' => '- '.trans('forms.gender').' -', 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('gender')) <div class="text-danger">{{ $errors->first('gender') }}</div> @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('assigned_teacher', trans('forms.assigned-teacher')) !!}
        {!! Form::select('assigned_teacher', $teachers, null, ['class' => 'form-control select2bs4', 'placeholder' => '- '.trans('forms.assigned-teacher').' -', 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('assigned_teacher')) <div class="text-danger">{{ $errors->first('assigned_teacher') }}</div> @endif
    </div>
</div>

<x-datePickerScript endDate="2003-12-31 00:00:00" />