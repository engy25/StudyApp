<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpRegisterEmail extends Mailable
{
  use Queueable, SerializesModels;

  public $mailData;

  /**
   * Create a new message instance.
   */
  public function __construct($mailData)
  {
    $this->mailData = $mailData;
    \Log::info('OtpRegisterEmail initialized with data: ', $mailData);
  }

  /**
   * Build the message.
   *
   * @return $this
   */

  public function envelope(): Envelope
  {

    // Set the email content
    $content = "Hello, " . $this->mailData["fullname"] . "! Your OTP is: " . $this->mailData["otp"];

    return new Envelope(
      subject: $content,
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      view: 'content.emails.index',
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

