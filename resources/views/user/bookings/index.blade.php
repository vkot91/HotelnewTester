@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>


    @can('booking_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.bookings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.bookings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }} @can('booking_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('booking_delete')
                        @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan
                    <th>@lang('quickadmin.bookings.fields.is_active')</th>
                    <th>@lang('quickadmin.bookings.fields.first_name')</th>
                    <th>@lang('quickadmin.bookings.fields.last_name')</th>
                    <th>@lang('quickadmin.bookings.fields.address')</th>
                    <th>@lang('quickadmin.bookings.fields.phone')</th>
                    <th>@lang('quickadmin.bookings.fields.email')</th>
                    <th>@lang('quickadmin.bookings.fields.room')</th>
                    <th>@lang('quickadmin.bookings.fields.time-from')</th>
                    <th>@lang('quickadmin.bookings.fields.time-to')</th>
                    <th>@lang('quickadmin.bookings.fields.additional-information')</th>
                        <th>@lang('quickadmin.bookings.fields.diff_days')</th>
                        <th>@lang('quickadmin.bookings.fields.all_price')</th>


                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($bookings) > 0)
                    @foreach (Auth::user()->bookings as $booking)
                        <tr data-entry-id="{{ $booking->id }}">
                            @can('booking_delete')
                                @if ( request('show_deleted') != 1 )<td></td>@endif
                            @endcan
                            <td field-key='is_active'>{{ $booking->isActive }}</td>
                            <td field-key='first_name'>{{ $booking->first_name }}</td>
                            <td field-key='last_name'>{{ $booking->last_name}}</td>
                            <td field-key='address'>{{ $booking->address}}</td>
                            <td field-key='phone'>{{ $booking->phone}}</td>
                            <td field-key='email'>{{ $booking->email}}</td>
                            <td field-key='room'>{{ $booking->room->room_number or '' }}</td>
                            <td field-key='time_from'>{{ $booking->time_from }}</td>
                            <td field-key='time_to'>{{ $booking->time_to }}</td>
                            <td field-key='additional_information'>{!! $booking->additional_information !!}</td>
                                <td field-key='diff_days'>{!! $booking->diff_days  !!}</td>
                                <td field-key='all_price'>{!! $booking->all_price  !!}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('booking_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.bookings.restore', $booking->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('booking_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.bookings.perma_del', $booking->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('booking_viewUsers')
                                        <a href="{{ route('user.bookings.show',[$booking->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('booking_edit')
                                        <a href="{{ route('user.bookings.edit',[$booking->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('booking_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.bookings.destroy', $booking->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('booking_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
