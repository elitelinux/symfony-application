<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace UserBundle\Model;

interface UserInterface
{
    /**
     * Returns the id.
     *
     * @return mixed
     */
    public function getId();
}
