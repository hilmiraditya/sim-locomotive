<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPesanan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('locomotivewedding@gmail.com', 'Locomotive Wedding')
            ->subject('Surat Persetujuan Produksi')
            ->text('admin.pesanan.email.text')
            ->view('admin.pesanan.email.email');
    }
}
