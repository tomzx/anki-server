<?php namespace AnkiServer\SessionManager;

use AnkiServer\Session;

class SQLiteSessionManager implements SessionManagerInterface
{
	/**
	 * @param string $hostKey
	 * @return \AnkiServer\Session|void
	 */
	public function load($hostKey)
	{
		// TODO: Implement load() method.
	}

	/**
	 * @param string              $hostKey
	 * @param \AnkiServer\Session $session
	 */
	public function save($hostKey, Session $session)
	{
		// TODO: Implement save() method.
	}

	/**
	 * @param string $hostKey
	 */
	public function delete($hostKey)
	{
		// TODO: Implement delete() method.
	}
}