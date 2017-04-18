<?php

namespace Concur\Resource;

class Resource_TokenParser extends \Twig_TokenParser {
	public $twig = null;
	public function __construct(Twig $_Twig) {
		$this->twig = $_Twig;
	}
	public function parse(\Twig_Token $token) {
		$parser = $this->parser;
		$stream = $parser->getStream ();
		$name = $stream->expect ( \Twig_Token::NAME_TYPE )->getValue ();
		$value = $parser->getExpressionParser ()->parseExpression ();
		$stream->expect ( \Twig_Token::BLOCK_END_TYPE );
		
		$node = new Resource_Node ( $name, $value, $token->getLine (), $this->getTag (), dirname ( $this->parser->getStream ()->getSourceContext ()->getPath () ) );
		$node->twig = $this->twig;
		return $node;
	}
	public function getTag() {
		return 'resource';
	}
}