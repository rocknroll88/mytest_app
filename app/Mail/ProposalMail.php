<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Proposal;

class ProposalMail extends Mailable
{
    use Queueable, SerializesModels;


    public $proposal;

    /**
     * The order instance.
     *
     * @var Proposal
     */


    /**
     * Create a new message instance.
     *
     * @param Proposal $proposal
     * @return void
     */
    public function __construct($proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('emails.proposal')
                    ->attachFromStorage($this->proposal['file']);
    }
}
