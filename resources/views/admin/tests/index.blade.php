@extends('layouts.admin')
@section('content')
@can('test_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.test.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.test.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Test">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.test.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.radio') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.select') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.checkbox') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.test') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.textarea') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.integer') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.float') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.money') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.data_picker') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.data_time_picker') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.time_picker') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Test::RADIO_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Test::SELECT_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $key => $test)
                        <tr data-entry-id="{{ $test->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $test->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::RADIO_RADIO[$test->radio] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::SELECT_SELECT[$test->select] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $test->checkbox ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $test->checkbox ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $test->test ?? '' }}
                            </td>
                            <td>
                                {{ $test->email ?? '' }}
                            </td>
                            <td>
                                {{ $test->textarea ?? '' }}
                            </td>
                            <td>
                                {{ $test->integer ?? '' }}
                            </td>
                            <td>
                                {{ $test->float ?? '' }}
                            </td>
                            <td>
                                {{ $test->money ?? '' }}
                            </td>
                            <td>
                                {{ $test->data_picker ?? '' }}
                            </td>
                            <td>
                                {{ $test->data_time_picker ?? '' }}
                            </td>
                            <td>
                                {{ $test->time_picker ?? '' }}
                            </td>
                            <td>
                                @foreach($test->file as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($test->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('test_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tests.show', $test->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('test_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tests.edit', $test->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('test_delete')
                                    <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('test_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Test:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection