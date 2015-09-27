<?php

/*
 * This file is part of the utils-bundle package.
 *
 * (c) Javi H. Gil <https://github.com/javihgil>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jhg\UtilsBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface FormHandlerInterface
 *
 * @package Jhg\UtilsBundle\Form\Handler
 */
interface FormHandlerInterface
{
    /**
     * @param Form    $form
     * @param Request $request
     *
     * @return bool
     */
    public function process(Form $form, Request $request);
} 