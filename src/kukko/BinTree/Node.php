<?php
	namespace kukko\BinTree;

	class Node{
		private $key;
		private $value;
		private $left;
		private $right;
		public function __construct($key, $value){
			$this->key=$key;
			$this->value=$value;
		}
		public function set($key, $value){
			switch ($key<=>$this->key){
				case -1:
					if (isset($this->left)){
						$this->left->set($key, $value);
					}
					else{
						$this->left=new Node($key, $value);
					}
					break;
				case 0:
					$this->value=$value;
					break;
				case 1:
					if (isset($this->right)){
						$this->right->set($key, $value);
					}
					else{
						$this->right=new Node($key, $value);
					}
					break;
			}
		}
		public function get($key){
			switch ($key<=>$this->key){
				case -1:
					if (isset($this->left)){
						return $this->left->get($key);
					}
					else{
						return null;
					}
					break;
				case 0:
					return $this->value;
					break;
				case 1:
					if (isset($this->right)){
						return $this->right->get($key);
					}
					else{
						return null;
					}
					break;
			}
		}
	}