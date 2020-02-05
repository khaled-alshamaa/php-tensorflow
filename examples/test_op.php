<?php
require_once __DIR__ . '/../vendor/autoload.php';

function test_shape($val) {
	$tf = new TensorFlow\TensorFlow();
	$sess = $tf->session();

	$ret = $sess->run(
		$tf->op("Shape",
			[$tf->constant($val)]));
	var_dump($ret->value());
}

test_shape(1);
test_shape([1]);
test_shape([1,2]);
test_shape([[1,2,3],[4,5,6]]);

function test_stringJoin($val1, $val2) {
	$tf = new TensorFlow\TensorFlow();
	$sess = $tf->session();

	$join = $tf->op("StringJoin",
				[[$tf->constant($val1), $tf->constant($val2)]]);
	var_dump($join->op()->inputListSize("inputs"));
	$ret = $sess->run($join);
	var_dump($ret->value());
}

test_stringJoin("aa", "bb");
