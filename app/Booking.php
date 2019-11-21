<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class Booking
 *
 * @package App
 * @property string $room
 * @property string $time_from
 * @property string $time_to
 * @property text $additional_information
 */
class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = ['time_from', 'time_to', 'diff_days', 'additional_information', 'room_id', 'first_name', 'last_name', 'address', 'phone', 'email', 'user_id', 'all_price', 'isActive'];
    /**
     * Set to null if empty
     * @param $input
     */
public function diffdays()
{

}

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoomIdAttribute($input)
    {
        $this->attributes['room_id'] = $input ? $input : null;

    }

    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;

    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeFromAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_from'] = Carbon::createFromFormat(config('app.date_format') . ' H:i', $input)->format('Y-m-d H:i');
        } else {
            $this->attributes['time_from'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeFromAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTimeToAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['time_to'] = Carbon::createFromFormat(config('app.date_format') . ' H:i', $input)->format('Y-m-d H:i');
        } else {
            $this->attributes['time_to'] = null;
        }
    }
        public function diff($booking)
        {
            if (is_null($booking->time_to) || is_null($booking->time_from)) {
                $diff_days = 0; // or throw new \InvalidArgumentException();
            } else {
                $diff_days = $booking->time_to->diffInDays($booking->time_from);
            }
            return $diff_days;

        }
    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTimeToAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id')->withTrashed();
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
