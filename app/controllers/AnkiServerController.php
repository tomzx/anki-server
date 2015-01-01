<?php

use AnkiServer\AnkiService;

// TODO: Handle c (compression) flag
class AnkiServerController extends BaseController
{
	/**
	 * @var AnkiService
	 */
	protected $ankiService;

	/**
	 * @param \AnkiServer\AnkiService $ankiService
	 */
	public function __construct(AnkiService $ankiService)
	{
		$this->ankiService = $ankiService;
	}

	/**
	 * @return array|string
	 */
	protected function parseRequest()
	{
		$isDebug = Input::get('debug');
		if ($isDebug) {
			return Input::all();
		}

		$data = Input::file('data');
		return $data ? $this->decodeFile($data->getPathname()) : [];
	}

	/**
	 * @param $file
	 * @return array|string
	 */
	protected function decodeFile($file)
	{
		return $this->decodeData(file_get_contents($file));
	}

	/**
	 * @param $data
	 * @return array|string
	 */
	protected function decodeData($data)
	{
		$data = gzdecode($data);
		$data = json_decode($data, true) ?: $data;
		return $data;
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function syncHostKey()
	{
		$data = $this->parseRequest();

		$username = array_get($data, 'u');
		$password = array_get($data, 'p');

		if ( ! $username || ! $password) {
			App::abort(403);
		}

		// TODO: Authentication
		if (false) {
			// Not authenticated
			App::abort(403);
		}

		$hostKey = $this->ankiService->createSession($username);

		return Response::json([
			'key' => $hostKey,
		]);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function syncMeta()
	{
		$session = $this->getSession();

		$data = $this->parseRequest();

		if ($version = array_get($data, 'v')) {
			$session->setVersion($version);
		}

		if ($clientVersion = array_get($data, 'cv')) {
			$session->setClientVersion($clientVersion);
		}

		$this->ankiService->saveSession($session);

		// Read from the DB those values
		return Response::json($this->ankiService->getMeta());
	}

	public function syncStart()
	{
	}

	public function syncApplyChanges()
	{
	}

	public function syncChunk()
	{
	}

	/**
	 * @param \Session $session
	 */
	protected function chunk(Session $session)
	{
	}

	public function syncApplyChunk()
	{
	}

	public function syncSanityCheck2()
	{
	}

	public function syncFinish()
	{
	}

	public function syncUpload()
	{
		$session = $this->getSession();
		$data = $this->parseRequest();

		$result = file_put_contents($session->getCollectionPath(), $data);
		return Response::plain($result ? 'OK' : 'Error');
	}

	public function syncDownload()
	{
		$session = $this->getSession();

		$result = file_get_contents($session->getCollectionPath());
		return Response::plain($result);
	}

	/**
	 * @return \AnkiServer\Session
	 */
	protected function getSession()
	{
		$hostKey = Input::get('k');
		$session = $this->ankiService->getSession($hostKey);

		if ( ! $session) {
			App::abort(403);
		}

		Config::set('database.connections.ankiDatabase', [
			'driver'   => 'sqlite',
			'database' => $session->getCollectionPath(),
			'prefix'   => '',
		]);

		return $session;
	}

	/**
	 * @param string $path
	 */
	public function debug($path)
	{
		$data = $this->parseRequest();
		file_put_contents(storage_path(time().'.'.str_replace('/', '.', $path)), $data);
	}
}