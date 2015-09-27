# Utils bundle
Utility classes for Symfony projects

## Installation

    composer require 'javihgil/utils-bundle'

## Configure Bundle

Register the bundle in *app/AppKernel.php*:

    // app/AppKernel.php
    public function registerBundles()
    {
        return [
            // ...
            new \Jhg\UtilsBundle\UtilsBundle(),
        ];
    }

## Create form handler

Handler for creating doctrine entities in a CRUD controller. 

**Example**

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function createAction(Request $request)
    {
        $element = new Element();

        $form = $this->createForm(new ElementType(), $element);

        if ($this->get('create_form_handler')->process($form, $request)) {
            return $this->redirectToRoute('success_route', ['element', $element->getId()]);
        }

        $viewData = [
            'form' => $form->createView(),
        ];

        return $this->render('ExampleBundle:Element:create.html.twig', $viewData);
    }

## Update form handler

Handler for updating doctrine entities in a CRUD controller. 

**Example**

    /**
     * @param Element $element
     * @param Request $request
     *
     * @return Response
     */
    public function updateAction(Element $element, Request $request)
    {
        $form = $this->createForm(new ElementType(), $element);

        if ($this->get('update_form_handler')->process($form, $request)) {
            return $this->redirectToRoute('success_route', ['element', $element->getId()]);
        }

        $viewData = [
            'element' => $element,
            'form' => $form->createView(),
        ];

        return $this->render('ExampleBundle:Element:update.html.twig', $viewData);
    }


## Delete form handler

Handler for deleting doctrine entities in a CRUD controller. 

**Example**

    /**
     * @param Element $element
     * @param Request $request
     *
     * @return Response
     */
    public function deleteAction(Element $element, Request $request)
    {
        $form = $this->createForm(new ElementType(), $element);

        if ($this->get('delete_form_handler')->process($form, $request)) {
            return $this->redirectToRoute('success_route');
        }

        $viewData = [
            'element' => $element,
            'form' => $form->createView(),
        ];

        return $this->render('ExampleBundle:Element:delete.html.twig', $viewData);
    }


