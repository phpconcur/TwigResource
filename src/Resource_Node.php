<?php

namespace Concur\Resource;

class Resource_Node extends \Twig_Node {
	public $twig = null;
	public $twigpath = "";
	public function __construct($name, $value, $line, $tag = null, $twigpath) {
		parent::__construct ( [ 
				'value' => $value 
		], [ 
				'name' => $name 
		], $line, $tag );
		
		$this->twigpath = $twigpath;
	}
	/**
	 * $compiler is requirec by Twig_Node
	 *
	 * @SuppressWarnings("PHPMD.UnusedFormalParameter")
 	*/
	public function compile(\Twig_Compiler $compiler) {
		$filename = $this->getNode ( 'value' )->getAttribute ( 'value' );
	    $this->twig->addResource ( $this->getAttribute ( 'name' ), $filename,$this->twigpath  );
	}
}
