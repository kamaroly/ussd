<?php 

namespace Kamaro\Ussd\Services;

class SessionHandler 
{
	private string $sessionId;
	private string $phone;
	private string $input;
	private string $lang;

	function __construct(string $sessionId, string $phone, string $input, string $lang)
	{
		$this->sessionId = $sessionId;
		$this->phone     = $phone;
		$this->input     = $input;
		$this->lang      = $lang;
	}

	public static function forSession(string $sessionId, string $phone, string $input, string $lang)
	{
		return (new self(string $sessionId, string $phone, string $input, string $lang));
	}

	public function browse()
	{
		# code...
	}
}