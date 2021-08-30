<?php

namespace App\Controller;

use App\Entity\Tax;
use App\Form\TaxType;
use App\Repository\TaxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $form = $this->createForm(TaxType::class, null, [
            'method' => 'POST',
        ])->handleRequest($request);

        if ($form->isSubmitted()) {
            $formData = $form->getData();

            $dbData = $taxRepository->findOneBy(['year' => $formData['year'], 'month' => $formData['month']]);

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

    private function calculate(array $formData, $dbData): array
    {
        $differenceElectricity = $formData['electric'] - $dbData->getElectric();
        $taxElectricity = round($differenceElectricity * self::ELECTRICITY_RATE, 2);

        $differenceHotWC = round($formData['hotWc'] - $dbData->getHotWc(), 2);
        $differenceHotKitchen = round($formData['hotKitchen'] - $dbData->getHotKitchen(), 2);

        $differenceColdWC = round($formData['coldWc'] - $dbData->getColdWc(), 2);
        $differenceColdKitchen = round($formData['coldKitchen'] - $dbData->getColdKitchen(), 2);
        $totalDifferenceCold = $differenceColdWC + $differenceColdKitchen;

        $taxCold = round($totalDifferenceCold * self::COLD_WATER_RATE, 2);
        $taxFundExcl = round($formData['tax'] - $formData['fund'], 2);

        $differenceColdTotal = $differenceColdWC + $differenceColdKitchen;
        $taxColdTotal = round( ($differenceColdTotal) * self::COLD_WATER_RATE, 2);

        $taxTotal = round( ($taxFundExcl) + $taxElectricity + ($taxColdTotal) + self::RENT, 2 );

        return array(
            'dbHotWc' => $dbData->getHotWc(),
            'formHotWc' => $formData['hotWc'],
            'differenceHotWc' => $differenceHotWC,
            'dbHotKitchen' => $dbData->getHotKitchen(),
            'formHotKitchen' => $formData['hotKitchen'],
            'differenceHotKitchen' => $differenceHotKitchen,
            'dbColdWc' => $dbData->getColdWc(),
            'formColdWc' => $formData['coldWc'],
            'differenceColdWc' => $differenceColdWC,
            'dbColdKitchen' => $dbData->getColdKitchen(),
            'formColdKitchen' => $formData['coldKitchen'],
            'differenceColdKitchen' => $differenceColdKitchen,
            'dbElectricity' => $dbData->getElectric(),
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

        // Formatting the date, so it would not go past 12.
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

    /**
     * @Route ("/get-months", name="tax_get_months", methods={"GET"})
     */
    public function getMonths(Request $request, TaxRepository $taxRepository): JsonResponse
    {
        $year = $request->get('year');

        $taxes = $taxRepository->findBy([
            'year' => $year,
        ]);

        $months = [];

        foreach ($taxes as $tax) {
            $months[$tax->getMonth()] = $this->getMonthName($tax->getMonth());
        }

        return new JsonResponse($months);
    }

    private function getMonthName(int $month): string
    {
        $monthName = '';

        switch ($month) {
            case 1:
                $monthName = 'Sausis';
                break;
            case 2:
                $monthName = 'Vasaris';
                break;
            case 3:
                $monthName = 'Kovas';
                break;
            case 4:
                $monthName = 'Balandis';
                break;
            case 5:
                $monthName = 'Gegužė';
                break;
            case 6:
                $monthName = 'Birželis';
                break;
            case 7:
                $monthName = 'Liepa';
                break;
            case 8:
                $monthName = 'Rugpjūtis';
                break;
            case 9:
                $monthName = 'Rugsėjis';
                break;
            case 10:
                $monthName = 'Spalis';
                break;
            case 11:
                $monthName = 'Lapkritis';
                break;
            case 12:
                $monthName = 'Gruodis';
                break;
        }

        return $monthName;
    }
}