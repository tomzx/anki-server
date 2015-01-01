<?php

function intTime($scale = 1)
{
	return time()*$scale;
}

function joinPaths()
{
	return implode(DIRECTORY_SEPARATOR, func_get_args());
}