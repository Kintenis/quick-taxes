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

    public function show(TaxRepository $taxRepository ,Request $request): Response
    {
        $form = $this->createForm(TaxType::class)->handleRequest($request);

        if ($form->isSubmitted()) {
            $formYear = $form->getData()['year'];
            $formMonth = $form->getData()['month'];

            $formData = $form->getData();

            $dbData = (array)$taxRepository->findOneBy(['year' => $formYear, 'month' => $formMonth]);
            $dbData = $this->formatDbArray($dbData);

            $this->calculate($formData, $dbData);

            return $this->render('tax/tax.show.html.twig', [
                'formData' => $formData,
                'dbData' => $dbData,
            ]);
        }

        return $this->render('tax/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function formatDbArray(array $dbData): array
    {
        unset($dbData["\x00App\Entity\Tax\x00id"], $dbData["\x00App\Entity\Tax\x00fund"]);

        $dbData['year'] = $dbData["\x00App\Entity\Tax\x00year"];
        $dbData['month'] = $dbData["\x00App\Entity\Tax\x00month"];
        $dbData['hotWc'] = $dbData["\x00App\Entity\Tax\x00hotWc"];
        $dbData['hotKitchen'] = $dbData["\x00App\Entity\Tax\x00hotKitchen"];
        $dbData['coldWc'] = $dbData["\x00App\Entity\Tax\x00coldWc"];
        $dbData['coldKitchen'] = $dbData["\x00App\Entity\Tax\x00coldKitchen"];
        $dbData['electric'] = $dbData["\x00App\Entity\Tax\x00electric"];
        $dbData['tax'] = $dbData["\x00App\Entity\Tax\x00tax"];
        unset($dbData["\x00App\Entity\Tax\x00year"], $dbData["\x00App\Entity\Tax\x00month"], $dbData["\x00App\Entity\Tax\x00hotWc"], $dbData["\x00App\Entity\Tax\x00hotKitchen"], $dbData["\x00App\Entity\Tax\x00coldWc"], $dbData["\x00App\Entity\Tax\x00coldKitchen"], $dbData["\x00App\Entity\Tax\x00electric"], $dbData["\x00App\Entity\Tax\x00tax"]);

        return $dbData;
    }

    private function calculate(array $formData, array $dbData): void
    {
        dd($formData, $dbData);
    }
}
