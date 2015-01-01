<?php namespace AnkiServer\SessionManager;

use AnkiServer\Session;

interface SessionManagerInterface
{
	/**
	 * @param string $hostKey
	 * @return \AnkiServer\Session
	 */
	public function load($hostKey);

	/**
	 * @param string              $hostKey
	 * @param \AnkiServer\Session $session
	 * @return void
	 */
	public function save($hostKey, Session $session);

	/**
	 * @param string $hostKey
	 * @return void
	 */
	public function delete($hostKey);
}