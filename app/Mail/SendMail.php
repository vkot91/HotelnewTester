<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $room_id;
    public $time_from;
    public $time_to;
    public $additional_information;
    public $all_price;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name,$last_name,$address,$phone, $email,$room_id,$time_from,$time_to,$additional_information,$all_price)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->address=$address;
        $this-> phone=$phone;
        $this-> email=$email;
        $this-> room_id=$room_id;
        $this-> time_from=$time_from;
        $this-> time_to=$time_to;
        $this-> additional_information=$additional_information;
        $this->all_price=$all_price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $address = $this->address;
        $phone = $this -> phone;
        $email = $this -> email;
        $room_id = $this -> room_id;
        $time_from = $this -> time_from;
        $time_to = $this -> time_to;
        $additional_information = $this -> additional_information;
        $all_price = $this ->all_price;
        return $this->view('mail.dynamic_email_template',compact('first_name','last_name','address','phone','email','room_id','time_from','time_to','additional_information','all_price'))->subject('Booking');
    }
}
