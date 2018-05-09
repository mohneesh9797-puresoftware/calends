--TEST--
Calends\Calends->withEndDate() Basic test
--SKIPIF--
<?php
if (!extension_loaded('calends')) {
	echo 'skip';
}
?>
--FILE--
<?php
	$tmp = Calends\Calends::create();
	var_dump($ret = $tmp->withEndDate('10', 'tai64', 'decimal'));
	echo $ret->date(), "\n";
	echo $ret->duration(), "\n";
	echo $ret->endDate(), "\n";
?>
--EXPECTF--
object(Calends\Calends)#%d (%d) {
  ["goId":"Calends\Calends":private]=>
  float(%d)
}
1.994980000
17.99749
18.000082000
