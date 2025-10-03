<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KonfirmasiLamaranMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lowongan;
    public $pelamar;
    public $konfirmasi;
    public function __construct($pelamar, $lowongan, $konfirmasi)
    {
        $this->pelamar = $pelamar;
        $this->lowongan = $lowongan;
        $this->konfirmasi  = $konfirmasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Konfirmasi Interview - ' . $this->lowongan->judul)
            ->view('emails.konfirmasi-lamaran');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Lamaran Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.konfirmasi-lamaran',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
