<?php
// src/Controller/ErrorController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error/{code}", name="error")
     */
    public function show(int $code): Response
    {
        $template = sprintf('bundles/TwigBundle/Exception/error%d.html.twig', $code);

        if (!$this->get('twig')->getLoader()->exists($template)) {
            $template = 'bundles/TwigBundle/Exception/error.html.twig';
        }

        return $this->render($template, ['code' => $code]);
    }
}