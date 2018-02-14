<?php

namespace XRuff\Components\Navigation;

use Nette\SmartObject;

class Configuration
{
    use SmartObject;

	/** @var string $shortSession */
	public $shortSession;

	/** @var string $longSession */
	public $longSession;

	/** @var string $nofityEmail */
	public $nofityEmail;

	/** @var int $passwordLength */
	public $passwordLength;

	/** @var bool $loginAfterRegistration */
	public $loginAfterRegistration;

	/** @var bool $activeAfterRegistration */
	public $activeAfterRegistration;

	/** @var array $tables */
	public $tables;

	/**
	 * @param string $shortSession
	 * @param string $longSession
	 * @param string $nofityEmail
	 */
	public function __construct(
		$shortSession,
		$longSession,
		$nofityEmail,
		$passwordLength,
		$loginAfterRegistration,
		$activeAfterRegistration,
		$tables
	)
	{
		$this->shortSession = $shortSession;
		$this->longSession = $longSession;
		$this->nofityEmail = $nofityEmail;
		$this->passwordLength = $passwordLength;
		$this->loginAfterRegistration = $loginAfterRegistration;
		$this->activeAfterRegistration = $activeAfterRegistration;
		$this->tables = $tables;
	}
}
