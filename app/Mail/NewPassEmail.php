<?php

namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPassEmail extends Mailable
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
			->subject('!! New login credential for '. env('MAIL_FROM_NAME'))
			->view('grocery.forgot.password_mail', ['data' => $data]);
	}

}
