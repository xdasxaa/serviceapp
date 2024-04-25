<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('/api/cars')]
class CarController extends AbstractController
{
    #[Route('/', name: 'api_car_index', methods: ['GET'])]
    public function apiIndex(CarRepository $carRepository): JsonResponse
    {
        $cars = $carRepository->findAll();

        $carsData = [];
        foreach ($cars as $car) {
            $carsData[] = [
                'id' => $car->getId(),
                'brand' => $car->getBrand(),
                'model' => $car->getModel(),
                'rentalPrice' => $car->getRentalPrice(),
                'pictures' => $car->getPictures(),
                'location' => $car->getLocation(),
                'year' => $car->getYear(),
                'typeOfGearbox' => $car->getTypeOfGearbox(),
                'fuelType' => $car->getFuelType(),
                'placeOfDelivery' => $car->getPlaceOfDelivery(),
                'placeOfReteur' => $car->getPlaceOfReteur(),
                'description' => $car->getDescription(),
                'postedAt' => $car->getPostedAt()->format('Y-m-d H:i:s'),
            ];
        }


        return new JsonResponse($carsData);
    }

    #[Route('/new', name: 'api_car_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $car = new Car();
        // Populate car entity with data from request
        $car->setBrand($data['brand']);
        $car->setModel($data['model']);
        // Set other fields as needed

        $entityManager->persist($car);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Car added successfully'], Response::HTTP_CREATED);
    }

    #[Route('/{id}', name: 'api_car_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'api_car_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('api_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'api_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('api_car_index', [], Response::HTTP_SEE_OTHER);
    }
}
