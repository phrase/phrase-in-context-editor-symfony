<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function index(TranslatorInterface $translator): Response
    {
        $heroTitle = $translator->trans('hero_title');
        $heroDescription = $translator->trans('hero_description');

        return $this->render('index.html.twig', [
            'hero_title' => $heroTitle,
            'hero_description' => $heroDescription
        ]);
    }
}