<?php
date_default_timezone_set('Asia/Jakarta');

define('HS', 'localhost'); //host
define('DB', 'test'); //database name
define('US', 'root'); //username
define('PS', '1'); //password
define('DR', 'mysql'); //driver
// Sqlite
//define('DB', dirname(dirname(__FILE__)) . '/database.sq3');

function db($args = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION))
{
	static $db;
	//Sqlite
	//$db = $db ?: (new PDO('mysql:' . DB, 'root', '1', $args));
	//Mysql
	$db = $db ?: (new PDO('mysql:host=' . HS . ';dbname=' . DB, US, PS, $args));
	return $db;
}
function query($sql, $params = NULL)
{
	$s = db()->prepare($sql);
	$s->execute(array_values((array) $params));
	return $s;
}
function insert($table, $data)
{
	query("INSERT INTO $table(" . join(',', array_keys($data)) . ')VALUES('
		. str_repeat('?,', count($data)-1). '?)', $data);
	return db()->lastInsertId();
}
function update($table, $data, $value)
{
	return query("UPDATE $table SET ". join('`=?,`', array_keys($data))
		. "=?WHERE id=?", $data + array($value))->rowCount();
}
function delete($table, $field, $value)
{
	return query("DELETE FROM $table WHERE $field = ?", $value)->rowCount();
}
function filter($string)
{
	return nl2br(htmlspecialchars(trim(@iconv('UTF-8', 'UTF-8//TRANSLIT//IGNORE', $string))));
}
