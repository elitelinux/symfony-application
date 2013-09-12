<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Bundle\BehaviorBundle\Filter;

use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\ORM\Mapping\ClassMetadata;
use Endroid\Bundle\BehaviorBundle\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class TranslationFilter extends SQLFilter implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function addFilterConstraint(ClassMetadata $target, $alias)
    {
        $filter = '';

        if ($target->reflClass->implementsInterface('Endroid\Bundle\BehaviorBundle\Model\TranslationInterface')) {
            $filter = $alias.'.locale = '.$this->getParameter('locale');
        }

        return $filter;
    }
}
