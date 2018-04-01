<?php
	require __DIR__ . '/../vendor/autoload.php';
	require __DIR__ . '/randomString.php';
	use kukko\BinTree\Node;

	$maxKey=1000;
	$nodeCNT=800;

	for ($i=0; $i<$nodeCNT; $i++){
		if (isset($root)){
			$root->set(mt_rand(0, $maxKey), randomString());
		}
		else{
			$root=new Node(mt_rand(0, $maxKey), randomString());
		}
	}

	var_dump($root->levelIsFullyFilled(3));