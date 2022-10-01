<?php

namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotEmail extends Mailable
{
	use SerializesModels;

	protected $data;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		$data = $this->data;
		return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
			->subject('Reset your password for'. env('MAIL_FROM_NAME'))
			->view('grocery.forgot.mail', ['data' => $data]);
	}

}
