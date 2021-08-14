<?php

namespace App\Controller;

use App\Entity\Tax;
use App\Form\TaxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxController extends AbstractController
{
    /**
     * @Route("/tax", name="tax")
     */

    public function calculate(): Response
    {
        $tax = new Tax();

        $form = $this->createForm(TaxType::class, $tax);

        return $this->render('tax/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
