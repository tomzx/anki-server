<?php

Response::macro('plain', function($value, $status = 200, array $headers = []) {
	return Response::make($value, $status, array_merge(['Content-Type' => 'text/plain'], $headers));
});