<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FinancingCompletedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $mail = $this->subject('📩 Nouveau dossier complété - ' . ($this->data['request_id'] ?? ''))
            ->view('emails.financing_completed_admin')
            ->with($this->data);

        foreach (['identity_front', 'identity_back', 'passport'] as $file) {
            if (!empty($this->data[$file]) && Storage::disk('local')->exists($this->data[$file])) {
                $mail->attachFromStorageDisk('local', $this->data[$file]);
            }
        }

        return $mail;
    }
}