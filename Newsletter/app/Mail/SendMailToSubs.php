<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendMailToSubs extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $file_name;
    public $file_id;

    public function __construct($template, $file_name, $file_id)
    {
        $this->template = $template;
        $this->file_name = $file_name;
        $this->file_id = $file_id;
    }


    public function build()
    {
        $filePath = Storage::path('public/' . $this->file_id . '/' . $this->file_name);
        return $this->from('essafi095@gmail.com', 'NewsLetter')
            ->html(htmlspecialchars_decode($this->template))
            ->attach($filePath);
    }
}