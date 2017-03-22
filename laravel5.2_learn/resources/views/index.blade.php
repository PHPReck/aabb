<?php 

$timezone = Config::get("app.timezone");
var_dump($timezone);

var_dump(URL::to('foo/bar'));