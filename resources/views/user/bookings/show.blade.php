@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.is_active')</th>
                            <td field-key='is_active'>{{ $booking->isActive}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.first_name')</th>
                            <td field-key='first_name'>{{ $booking->first_name}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.last_name')</th>
                            <td field-key='last_name'>{{ $booking->last_name}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.address')</th>
                            <td field-key='address'>{{ $booking->address}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.phone')</th>
                            <td field-key='phone'>{{ $booking->phone}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.email')</th>
                            <td field-key='email'>{{ $booking->email}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.room')</th>
                            <td field-key='room'>{{ $booking->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.time-from')</th>
                            <td field-key='time_from'>{{ $booking->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.time-to')</th>
                            <td field-key='time_to'>{{ $booking->time_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $booking->additional_information !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.diff_days')</th>
                            <td field-key='nights'>{!! $booking->diff_days  !!}</td>
                        </tr>
                    <tr>
                        <th>@lang('quickadmin.bookings.fields.all_price')</th>
                        <td field-key='total'>{!! $booking->all_price  !!}</td>
                    </tr>



                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('user.bookings.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
