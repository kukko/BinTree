<?php
	namespace kukko\BinTree;

	class Node{
		private $key;
		private $value;
		private $depth;
		private $left;
		private $right;
		public function __construct($key, $value, $depth=0){
			$this->key=$key;
			$this->value=$value;
			$this->depth=$depth;
		}
		public function set($key, $value){
			switch ($key<=>$this->key){
				case -1:
					if (isset($this->left)){
						$this->left->set($key, $value);
					}
					else{
						$this->left=new Node($key, $value, $this->depth+1);
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
						$this->right=new Node($key, $value, $this->depth+1);
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
		public function getValue(){
			return $this->value;
		}
		public function getNodesFromDepth($depth){
			if ($this->depth+1==$depth){
				$output=[];
				if (isset($this->left)){
					$output[]=$this->left->getValue();
				}
				if (isset($this->right)){
					$output[]=$this->right->getValue();
				}
				return $output;
			}
			else if($this->depth+1<$depth){
				return array_merge($this->left->getNodesFromDepth($depth), $this->right->getNodesFromDepth($depth));
			}
			else{
				return [];
			}
		}
		public function levelIsFullyFilled($depth){
			return count($this->getNodesFromDepth($depth))==pow(2, $depth);
		}
	}