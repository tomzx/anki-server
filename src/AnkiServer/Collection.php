<?php namespace AnkiServer;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $connection = 'ankiDatabase';

	protected $table = 'col';

	/**
	 * @return double
	 */
	public function getScm()
	{
		return (double)$this->scm;
	}

	/**
	 * @param string $scm
	 * @return $this
	 */
	public function setScm($scm)
	{
		$this->scm = $scm;

		return $this;
	}

	/**
	 * @return double
	 */
	public function getMod()
	{
		return (double)$this->mod;
	}

	/**
	 * @param string $mod
	 * @return $this
	 */
	public function setMod($mod)
	{
		$this->mod = $mod;

		return $this;
	}

	/**
	 * @return double
	 */
	public function getUsn()
	{
		return (double)$this->usn;
	}

	/**
	 * @param string $usn
	 * @return $this
	 */
	public function setUsn($usn)
	{
		$this->usn = $usn;

		return $this;
	}
}