<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

define('ANKI_SERVER_VERSION', '0.1.0');
define('ANKI_SERVER_STRING', 'Anki Server '.ANKI_SERVER_VERSION);

Route::post('sync/hostKey', 'AnkiServerController@syncHostKey');

Route::post('sync/meta', 'AnkiServerController@syncMeta');

Route::post('sync/start', 'AnkiServerController@syncStart');

Route::post('sync/applyChanges', 'AnkiServerController@syncApplyChanges');

Route::post('sync/chunk', 'AnkiServerController@syncChunk');

Route::post('sync/applyChunk', 'AnkiServerController@syncApplyChunk');

Route::post('sync/sanityCheck2', 'AnkiServerController@syncSanityCheck2');

Route::post('sync/finish', 'AnkiServerController@syncFinish');

Route::post('sync/upload', 'AnkiServerController@syncUpload');

Route::post('sync/download', 'AnkiServerController@syncDownload');

Route::any('{path}', 'AnkiServerController@debug')->where('path', '.*');
