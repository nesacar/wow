<?php

namespace App\Mail;

use App\Newsletter;
use App\Newsletter_templates;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
    public $templates;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter, $templates)
    {
        $this->newsletter = $newsletter;
        $this->templates = $templates;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->view('themes.wow.emails.newsletter')->with('newsletter', $this->newsletter)->with('templates', $this->templates);
        $message->subject($this->newsletter->title);
        $message->from('wow@mia.rs', 'Newsletter Wow Malta');
        return $message;
    }
}
