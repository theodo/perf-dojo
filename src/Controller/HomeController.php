<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @var SkillRepository
     */
    private $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function homeAction(Request $request): Response
    {
        $skills = $this->skillRepository->findAll();

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
            'skills' => $skills,
            'assets' => $assets,
        ]);
    }
}
