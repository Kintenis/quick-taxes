<?php

namespace App\Controller;

use App\Entity\Tax;
use App\Form\TaxType;
use App\Repository\TaxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxController extends AbstractController
{
    /**
     * @Route("/tax", name="tax")
     */

    public function calculate(TaxRepository $taxRepository ,Request $request): Response
    {
        $form = $this->createForm(TaxType::class)->handleRequest($request);

        if ($form->isSubmitted()) {
            $formYear = $form->getData()['year'];
            $formMonth = $form->getData()['month'];

            $formData = $form->getData();
            $dbTax = (array)$taxRepository->findOneBy(['year' => $formYear, 'month' => $formMonth]);

            return $this->render('tax/tax.show.html.twig', [
                'formData' => $formData,
                'dbData' => $dbTax,
            ]);
        }

        return $this->render('tax/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
