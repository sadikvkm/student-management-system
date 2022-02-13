<div class="row">
    <div class="col-md-6">
        {!! Form::label('student_id', trans('forms.students')) !!}
        {!! Form::select('student_id', $students, null, ['class' => 'form-control select2bs4', 'placeholder' => trans('forms.students'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('student_id')) <div class="text-danger">{{ $errors->first('student_id') }}</div> @endif
    </div>
    <div class="col-md-6">
        {!! Form::label('terms', trans('forms.terms')) !!}
        {!! Form::select('terms', $terms, null, ['class' => 'form-control', 'placeholder' => trans('forms.terms'), 'required', 'maxlength' => 100]) !!}
        @if ($errors->has('terms')) <div class="text-danger">{{ $errors->first('term') }}</div> @endif
    </div>
</div>
<h6 class="mt-3"><b>Subjects</b></h6>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 60%;">Subject</th>
                    <th style="width: 50%;">Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $key => $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>
                            <input type="text" class="form-control number-only mark-field" value="{{isset($item['marks']) ? $item['marks'] : ''}}" name="marks_{{$key}}" id="mark-field{{$key}}" placeholder="Mark" required max="99999"/>
                            <input type="hidden" class="form-control" value="{{$item['id']}}" name="subject_id[]" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{asset('/modules/marks/form.js')}}"></script>
@endpush