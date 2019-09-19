<?php

namespace AzizJH\TwigDefaults;

use AzizJH\TwigDefaults\Node\DefaultsNode;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Defines a variable.
 *
 *  {% defaults {foo: 'bar', bool: true} %}
 */

class DefaultsTokenParser extends AbstractTokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param Token $token A Twig_Token instance
     *
     * @return Node A Twig_Node instance
     * @throws \Twig\Error\SyntaxError
     */
    public function parse(Token $token)
    {
        $stream = $this->parser->getStream();

        $expr = $this->parser->getExpressionParser()->parseExpression();
        $stream->expect(Token::BLOCK_END_TYPE);

        return new DefaultsNode($expr, $token->getLine(), $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'defaults';
    }
}
