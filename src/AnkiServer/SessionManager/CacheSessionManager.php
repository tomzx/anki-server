<?php namespace AnkiServer\SessionManager;

use AnkiServer\Session;
use Cache;

class CacheSessionManager implements SessionManagerInterface
{
	/**
	 * @param string $hostKey
	 * @return \AnkiServer\Session
	 */
	public function load($hostKey)
	{
		return Cache::get($hostKey);
	}

	/**
	 * @param string              $hostKey
	 * @param \AnkiServer\Session $session
	 */
	public function save($hostKey, Session $session)
	{
		Cache::forever($hostKey, $session);
	}

	/**
	 * @param string $hostKey
	 */
	public function delete($hostKey)
	{
		Cache::forget($hostKey);
	}
}