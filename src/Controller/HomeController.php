<?php

namespace App\Controller;

use App\Repository\BreedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @var BreedRepository
     */
    private $breedRepository;

    public function __construct(BreedRepository $breedRepository)
    {
        $this->breedRepository = $breedRepository;
    }

    public function homeAction(): Response
    {
        $breeds = $this->breedRepository->findAll();

        return $this->render('home.html.twig', [
            'breeds' => $breeds,
        ]);
    }
}
