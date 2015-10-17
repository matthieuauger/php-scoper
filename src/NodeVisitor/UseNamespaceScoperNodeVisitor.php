<?php

namespace Webmozart\PhpScoper\NodeVisitor;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class UseNamespaceScoperNodeVisitor extends NodeVisitorAbstract
{
    /**
     * @var string
     */
    private $prefix;

    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Stmt\UseUse) {
            $node->name = Node\Name::concat($this->prefix, $node->name);
        }
    }
}