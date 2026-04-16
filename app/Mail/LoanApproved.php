<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApproved extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->data['subject'] ?? 'Votre demande de financement a été acceptée')
            ->view('emails.loan-approved')
            ->with([
                'financing' => $this->data['financing'] ?? [],
                'name' => $this->data['name'] ?? '',
                'request_id' => $this->data['request_id'] ?? '',
                'approved_at' => $this->data['approved_at'] ?? now()->format('Y-m-d H:i:s'),
            ]);
    }
}