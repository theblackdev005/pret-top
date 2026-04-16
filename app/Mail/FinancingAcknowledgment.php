<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinancingAcknowledgment extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject(translate(547))
        
            ->view('emails.financing_ack')
            ->with([
                'fullname' => $this->data['name'],
                'financing' => $this->data['financing'],
                'request_id' => $this->data['request_id'] ?? '',
            ]);
    }
    
}
