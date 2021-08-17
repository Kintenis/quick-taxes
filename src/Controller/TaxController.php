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
    const ELECTRICITY_RATE = 0.127;
    const COLD_WATER_RATE = 1.72;
    const RENT = 130;

    /**
     * @Route("/tax", name="tax")
     */

    public function show(TaxRepository $taxRepository, Request $request): Response
    {
        $form = $this->createForm(TaxType::class)->handleRequest($request);

        if ($form->isSubmitted()) {
            $formData = $form->getData();

            $dbData = (array)$taxRepository->findOneBy(['year' => $formData['year'], 'month' => $formData['month']]);
            $dbData = $this->formatDbArray($dbData);

            $taxes = ($this->calculate($formData, $dbData));

            return $this->render('tax/tax.show.html.twig', [
                'taxes' => $taxes,
                'dbSend' => $this->checkDataBeforeFlushing($formData),
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

    private function calculate(array $formData, array $dbData): array
    {
        $differenceElectricity = $formData['electric'] - $dbData['electric'];
        $taxElectricity = round($differenceElectricity * self::ELECTRICITY_RATE, 2);

        $differenceHotWC = round($formData['hotWc'] - $dbData['hotWc'], 2);
        $differenceHotKitchen = round($formData['hotKitchen'] - $dbData['hotKitchen'], 2);

        $differenceColdWC = round($formData['coldWc'] - $dbData['coldWc'], 2);
        $differenceColdKitchen = round($formData['coldKitchen'] - $dbData['coldKitchen'], 2);
        $totalDifferenceCold = $differenceColdWC + $differenceColdKitchen;

        $taxCold = round($totalDifferenceCold * self::COLD_WATER_RATE, 2);
        $taxFundExcl = round($formData['tax'] - $formData['fund'], 2);

        $differenceColdTotal = $differenceColdWC + $differenceColdKitchen;
        $taxColdTotal = round( ($differenceColdTotal) * self::COLD_WATER_RATE, 2);

        $taxTotal = round( ($taxFundExcl) + $taxElectricity + ($taxColdTotal) + self::RENT, 2 );

        return array(
            'dbHotWc' => $dbData['hotWc'],
            'formHotWc' => $formData['hotWc'],
            'differenceHotWc' => $differenceHotWC,
            'dbHotKitchen' => $dbData['hotKitchen'],
            'formHotKitchen' => $formData['hotKitchen'],
            'differenceHotKitchen' => $differenceHotKitchen,
            'dbColdWc' => $dbData['coldWc'],
            'formColdWc' => $formData['coldWc'],
            'differenceColdWc' => $differenceColdWC,
            'dbColdKitchen' => $dbData['coldKitchen'],
            'formColdKitchen' => $formData['coldKitchen'],
            'differenceColdKitchen' => $differenceColdKitchen,
            'dbElectricity' => $dbData['electric'],
            'formElectricity' => $formData['electric'],
            'differenceElectricity' => $differenceElectricity,
            'taxTotalElectricity' => $taxElectricity,
            'totalDifferenceCold' => $totalDifferenceCold,
            'taxTotalCold' => $taxCold,
            'formTax' => $formData['tax'],
            'formFund' => $formData['fund'],
            'taxWithoutFund' => $taxFundExcl,
            'rent' => self::RENT,
            'coldWaterRate' => self::COLD_WATER_RATE,
            'totalTax' => $taxTotal,
        );
    }

    private function checkDataBeforeFlushing(array $formData)
    {
        $year = $formData['year'];
        $month = $formData['month'];

        // Formatting the date.
        if ($month + 1 > 12) {
            $year++;
            $month = 1;
        } else {
            $month++;
        }

        // Checking if the date is unique
        $check = $this->getDoctrine()
            ->getRepository('App:Tax')
            ->findOneBy(array('year' => $year, 'month' => $month));

        if($check === null) {
            $output = array(
                'year' => $year,
                'month' => $month,
                'hotWc' => $formData['hotWc'],
                'hotKitchen' => $formData['hotKitchen'],
                'coldWc' => $formData['coldWc'],
                'coldKitchen' => $formData['coldKitchen'],
                'electricity' => $formData['electric'],
                'tax' => $formData['tax'],
                'fund' => $formData['fund'],
            );
        } else {
            $output = false;
        }

        return $output;
    }
}