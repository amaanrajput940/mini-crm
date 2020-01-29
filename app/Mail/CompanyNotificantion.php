<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyNotificantion extends Mailable
{
    use Queueable, SerializesModels;
    public $company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@mailtrap.io', 'Mailtrap')
            ->subject('New Company')
            ->markdown('mails.company_email')
            ->with([
                'name' => 'New Company account created',
                'link' => 'https://mailtrap.io/inboxes'
            ]);
    }
}
