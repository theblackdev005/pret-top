<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinancingPreAccepted extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject(
            '✔ ' . (($this->data['financing']['montant_du_pret'] ?? '')
                ? number_format((float)$this->data['financing']['montant_du_pret'], 0, ',', '.') . ' € - '
                : '') . translate(489)
        )
            ->view('emails.financing_preaccepted')
            ->with([
                'fullname' => $this->data['name'],
                'financing' => $this->data['financing'],
                'request_id' => $this->data['request_id'] ?? '',
            ]);
    }
}