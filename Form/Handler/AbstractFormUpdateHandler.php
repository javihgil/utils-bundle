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

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FormUpdateHandler
 *
 * @package Jhg\UtilsBundle\Form\Handler
 */
abstract class AbstractFormUpdateHandler implements FormHandlerInterface
{

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Form    $form
     * @param Request $request
     *
     * @return bool
     */
    public function process(Form $form, Request $request)
    {
        if (!$request->isMethod('POST')) {
            return false;
        }

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $this->em->persist($data);
            $this->em->flush();

            return true;
        }

        return false;
    }
}