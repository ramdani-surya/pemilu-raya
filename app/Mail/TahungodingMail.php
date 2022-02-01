<?php

namespace App\Mail;

use App\Models\Voter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TahungodingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    // https://laravel.com/docs/8.x/mail#queued-mailables-and-database-transactions
    // public $afterCommit = true;

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
            ->view('email.tahungoding_try');
    }
}
