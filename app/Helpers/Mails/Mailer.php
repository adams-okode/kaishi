<?php

namespace App\Helpers\Mails;

use App\Models\User;

class Mailer
{

    private $view;

    private $sender;

    private $subject;

    private $receiver;

    private $receiverName;

    private $multiple;

    private $user;

    public function __construct(User $user, $multiple = [])
    {
        $this->user = $user;
        $this->multiple = $multiple;
    }

    public function sendRegistrationEmail($data)
    {
        $this->initSingle('emails.welcome', "no-reply." . env('APP_DOMAIN'), 'Welcome', $this->user->email, $data, $this->user->name);
        $this->sendSingle();
    }

    public function initSingle($view, $sender, $subject, $receiver, $data, $receiverName)
    {
        $this->view = $view;
        $this->sender = $sender;
        $this->subject = $subject;
        $this->receiver = $receiver;
        $this->data = $data;
        $this->receiverName = $receiverName;
    }

    public function sendSingle()
    {
        try {
            $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
            $beautymail->send($this->view, $this->data, function ($message) {
                $message->from($this->sender)
                        ->to($this->receiver, $this->receiverName)
                        ->subject($this->subject);
            });
        } catch (\Exception $th) {
            \Log::error($th->getMessage());
        }
    }
}
