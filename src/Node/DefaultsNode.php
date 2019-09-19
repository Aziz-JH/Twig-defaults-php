<?php

namespace AzizJH\TwigDefaults\Node;

use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Node;
use Twig\Node\NodeCaptureInterface;


class DefaultsNode extends Node implements NodeCaptureInterface
{
    public function __construct(AbstractExpression $expr, $line, $tag = null)
    {
        $nodes = ['expr' => $expr];

        parent::__construct($nodes, [], $line, $tag);
    }

    public function compile(\Twig\Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$context = array_merge(')
            ->subcompile($this->getNode('expr'))
            ->raw(', $context)')
            ->raw(";\n");
    }
}
