<?php

namespace App\Controller;

use App\Repository\CatPictureRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @var CatPictureRepository
     */
    private $catPictureRepository;

    public function __construct(CatPictureRepository $catPictureRepository)
    {
        $this->catPictureRepository = $catPictureRepository;
    }

    public function homeAction(): Response
    {
        $pics = $this->catPictureRepository->findAll();

        return $this->render('home.html.twig', [
            'pics' => $pics,
        ]);
    }
}
