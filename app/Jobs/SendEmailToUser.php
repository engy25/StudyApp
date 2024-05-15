<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\OtpRegisterEmail;

class SendEmailToUser implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   */
  public $mailData;
  public function __construct($mailData)
  {
    $this->mailData = $mailData;
  }

  /**
   * Execute the job.
   */


  public function handle(): void
{
    // Send the email without waiting for view rendering
    Mail::to($this->mailData['mail_to'])->send(new OtpRegisterEmail($this->mailData));
}

}
