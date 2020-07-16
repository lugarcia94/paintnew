<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MailPoetVendor\Twig\Node\Expression;

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Twig\Compiler;
class MethodCallExpression extends \MailPoetVendor\Twig\Node\Expression\AbstractExpression
{
    public function __construct(\MailPoetVendor\Twig\Node\Expression\AbstractExpression $node, $method, \MailPoetVendor\Twig\Node\Expression\ArrayExpression $arguments, $lineno)
    {
        parent::__construct(['node' => $node, 'arguments' => $arguments], ['method' => $method, 'safe' => \false], $lineno);
        if ($node instanceof \MailPoetVendor\Twig\Node\Expression\NameExpression) {
            $node->setAttribute('always_defined', \true);
        }
    }
    public function compile(\MailPoetVendor\Twig\Compiler $compiler)
    {
        $compiler->subcompile($this->getNode('node'))->raw('->')->raw($this->getAttribute('method'))->raw('(');
        $first = \true;
        foreach ($this->getNode('arguments')->getKeyValuePairs() as $pair) {
            if (!$first) {
                $compiler->raw(', ');
            }
            $first = \false;
            $compiler->subcompile($pair['value']);
        }
        $compiler->raw(')');
    }
}
\class_alias('MailPoetVendor\\Twig\\Node\\Expression\\MethodCallExpression', 'MailPoetVendor\\Twig_Node_Expression_MethodCall');
