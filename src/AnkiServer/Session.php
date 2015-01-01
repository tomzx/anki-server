<?php namespace AnkiServer;

use Illuminate\Support\Collection;

class Session extends Collection
{
	/**
	 * @param string $username
	 */
	public function __construct($username)
	{
		parent::__construct();
		$this->items['username'] = $username;
		$this->items['hostKey'] = $this->generateHostKey($username);
		$this->items['version'] = null;
		$this->items['clientVersion'] = null;
		$this->items['path'] = storage_path(joinPaths('database', $username));

		if ( ! is_dir($this->getPath())) {
			mkdir($this->getPath(), 0777, true);
		}
	}

	/**
	 * @param string $username
	 * @return string
	 */
	protected function generateHostKey($username)
	{
		return md5(time() . $username);
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return $this->items['username'];
	}

	/**
	 * @return string
	 */
	public function getHostKey()
	{
		return $this->items['hostKey'];
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->items['path'];
	}

	/**
	 * @return string
	 */
	public function getCollectionPath()
	{
		return joinPaths($this->getPath(), 'collection.anki2');
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return $this->items['version'];
	}

	/**
	 * @param string $version
	 * @return $this
	 */
	public function setVersion($version)
	{
		$this->items['version'] = $version;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getClientVersion()
	{
		return $this->items['clientVersion'];
	}

	/**
	 * @param string $clientVersion
	 * @return $this
	 */
	public function setClientVersion($clientVersion)
	{
		$this->items['clientVersion'] = $clientVersion;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMinUsn()
	{
		return $this->items['minUsn'];
	}

	/**
	 * @param string $minUsn
	 * @return $this
	 */
	public function setMinUsn($minUsn)
	{
		$this->items['minUsn'] = $minUsn;

		return $this;
	}
}