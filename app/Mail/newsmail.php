<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newsmail extends Mailable
{
    use Queueable, SerializesModels;

    private $nemail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nemail)
    {
        
        $this->nemail=$nemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nemail = $this->nemail;
        return $this->view('frontend.uemail', compact('nemail'))->subject('News Details from News & Media Portals');
    }
}
