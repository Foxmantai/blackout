@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.radio') }}</label>
                @foreach(App\Models\Test::RADIO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('radio') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="radio_{{ $key }}" name="radio" value="{{ $key }}" {{ old('radio', $test->radio) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('radio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('radio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.radio_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.select') }}</label>
                <select class="form-control {{ $errors->has('select') ? 'is-invalid' : '' }}" name="select" id="select">
                    <option value disabled {{ old('select', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::SELECT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('select', $test->select) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('select'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.select_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('checkbox') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="checkbox" value="0">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox" value="1" {{ $test->checkbox || old('checkbox', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox">{{ trans('cruds.test.fields.checkbox') }}</label>
                </div>
                @if($errors->has('checkbox'))
                    <div class="invalid-feedback">
                        {{ $errors->first('checkbox') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.checkbox_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="test">{{ trans('cruds.test.fields.test') }}</label>
                <input class="form-control {{ $errors->has('test') ? 'is-invalid' : '' }}" type="text" name="test" id="test" value="{{ old('test', $test->test) }}">
                @if($errors->has('test'))
                    <div class="invalid-feedback">
                        {{ $errors->first('test') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.test_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.test.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $test->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="textarea">{{ trans('cruds.test.fields.textarea') }}</label>
                <textarea class="form-control {{ $errors->has('textarea') ? 'is-invalid' : '' }}" name="textarea" id="textarea">{{ old('textarea', $test->textarea) }}</textarea>
                @if($errors->has('textarea'))
                    <div class="invalid-feedback">
                        {{ $errors->first('textarea') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.textarea_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.test.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="integer">{{ trans('cruds.test.fields.integer') }}</label>
                <input class="form-control {{ $errors->has('integer') ? 'is-invalid' : '' }}" type="number" name="integer" id="integer" value="{{ old('integer', $test->integer) }}" step="1">
                @if($errors->has('integer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('integer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.integer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="float">{{ trans('cruds.test.fields.float') }}</label>
                <input class="form-control {{ $errors->has('float') ? 'is-invalid' : '' }}" type="number" name="float" id="float" value="{{ old('float', $test->float) }}" step="0.01">
                @if($errors->has('float'))
                    <div class="invalid-feedback">
                        {{ $errors->first('float') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.float_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="money">{{ trans('cruds.test.fields.money') }}</label>
                <input class="form-control {{ $errors->has('money') ? 'is-invalid' : '' }}" type="number" name="money" id="money" value="{{ old('money', $test->money) }}" step="0.01">
                @if($errors->has('money'))
                    <div class="invalid-feedback">
                        {{ $errors->first('money') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.money_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_picker">{{ trans('cruds.test.fields.data_picker') }}</label>
                <input class="form-control date {{ $errors->has('data_picker') ? 'is-invalid' : '' }}" type="text" name="data_picker" id="data_picker" value="{{ old('data_picker', $test->data_picker) }}">
                @if($errors->has('data_picker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_picker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.data_picker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_time_picker">{{ trans('cruds.test.fields.data_time_picker') }}</label>
                <input class="form-control datetime {{ $errors->has('data_time_picker') ? 'is-invalid' : '' }}" type="text" name="data_time_picker" id="data_time_picker" value="{{ old('data_time_picker', $test->data_time_picker) }}">
                @if($errors->has('data_time_picker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_time_picker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.data_time_picker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_picker">{{ trans('cruds.test.fields.time_picker') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_picker') ? 'is-invalid' : '' }}" type="text" name="time_picker" id="time_picker" value="{{ old('time_picker', $test->time_picker) }}">
                @if($errors->has('time_picker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_picker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.time_picker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.test.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.test.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.tests.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
      uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileMap[file.name]
      }
      $('form').find('input[name="file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($test) && $test->file)
          var files =
            {!! json_encode($test->file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.tests.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 10240,
      height: 10240
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($test) && $test->photo)
      var files = {!! json_encode($test->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection