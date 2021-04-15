<?php

namespace App\Mail;

use App\Models\Voter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TokenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $voter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Voter $voter)
    {
        $this->voter = $voter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->voter->election->name)
            ->view('email.token_mailing');
    }
}
