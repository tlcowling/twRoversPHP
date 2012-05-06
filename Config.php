<?php

defined("SOURCE_PATH") or define("SOURCE_PATH", realpath(dirname(__FILE__) . '/src'));
defined("TEST_PATH") or define("TEST PATH", realpath(dirname(__FILE__) . '/test'));

ini_set("error_reporting","true");
error_reporting(E_ALL|E_STRICT);