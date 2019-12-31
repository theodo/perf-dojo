<?php

namespace App\Controller;

use App\Repository\BreedRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function homeAction(Request $request): Response
    {
        $breeds = $this->breedRepository->findAll();

        if ($request->query->has('relative_assets') && $request->query->get('relative_assets') === 'true') {
            $assets = 'relative';
        } else {
            if ($request->query->has('cache_assets') && $request->query->get('cache_assets') === 'true') {
                $cache = 'cache';
            } else {
                $cache = 'nocache';
            }

            if ($request->query->has('https_assets') && $request->query->get('https_assets') === 'true') {
                $secure = 'secure';
            } else {
                $secure = 'insecure';
            }
            $assets = sprintf('cdn_%s_%s', $cache, $secure);
        }

        return $this->render('home.html.twig', [
            'breeds' => $breeds,
            'assets' => $assets,
        ]);
    }
}
