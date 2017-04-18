<?php

namespace Concur\Resource;
// http://twig.sensiolabs.org/doc/2.x/advanced.html
class Twig extends \Twig_Extension {
	public $resources = [ ];
	public function getFunctions() {
		return array (
				new \Twig_SimpleFunction ( 'ResourceList', array (
						$this,
						'ResourceList' 
				) ) 
		);
	}
	public function getTokenParsers() {
		return [ 
				new Resource_TokenParser ( $this ) 
		];
	}
	public function ResourceList($group, $key = null) {
		if ($key) {
			$rl = [ ];
			foreach ( $this->getResources ( $group ) as $res ) {
				$rl [] = $res [$key];
			}
		} else {
			$rl = $this->getResources ( $group );
		}
		return $rl;
	}
	public function getName() {
		return 'Resource File Helper';
	}
	public function addResource($group, $name, $twigpath) {
		if (! isset ( $this->resources [$group] )) {
			$this->resources [$group] = [ ];
		}
		
		$hash = md5 ( $name );
		if (! in_array ( $hash, array_keys ( $this->resources [$group] ) )) {
			$resource = [ ];
			$resource ["name"] = $name;
			$resource ["twig"] = $twigpath;
			
			$this->resources [$group] [$hash] = $resource;
		}
	}
	public function getResources($group) {
		if (! isset ( $this->resources [$group] )) {
			$this->resources [$group] = [ ];
		}
		return $this->resources [$group];
	}
}

?>