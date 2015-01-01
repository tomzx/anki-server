<?php namespace AnkiServer;

use AnkiServer\SessionManager\SessionManagerInterface;

class AnkiService
{
	/**
	 * @var SessionManagerInterface
	 */
	protected $sessionManager;

	/**
	 * @param \AnkiServer\SessionManager\SessionManagerInterface $sessionManager
	 */
	public function __construct(SessionManagerInterface $sessionManager)
	{
		$this->sessionManager = $sessionManager;
	}

	/**
	 * @param $hostKey
	 * @return \AnkiServer\Session
	 */
	public function getSession($hostKey)
	{
		return $this->sessionManager->load($hostKey);
	}

	/**
	 * @param string $username
	 * @return string
	 */
	public function createSession($username)
	{
		$session = new Session($username);
		$this->sessionManager->save($session->getHostKey(), $session);
		return $session->getHostKey();
	}

	/**
	 * @param \AnkiServer\Session $session
	 */
	public function saveSession(Session $session)
	{
		$this->sessionManager->save($session->getHostKey(), $session);
	}

	/**
	 * @return array
	 */
	public function getMeta()
	{
		$collection = Collection::first();

		return [
			'mod' => $collection->getMod(),
			'scm' => $collection->getScm(),
			'usn' => $collection->getUsn(),
			'ts' => intTime(),
			'musn' => 0, // TODO: Support media syncing
			'msg' => '',
			'cont' => true,
		];
	}
}