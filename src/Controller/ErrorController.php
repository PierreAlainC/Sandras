<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Twig\Environment;

#[AsController]
class ErrorController extends AbstractController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function show(\Throwable $exception): Response
    {
        $statusCode = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
        $typePageErreur = 'erreur';

        $template = sprintf('bundles/TwigBundle/Exception/error%s.html.twig', $statusCode);
        if (!$this->twig->getLoader()->exists($template)) {
            $template = 'bundles/TwigBundle/Exception/error.html.twig';
        }

        return new Response($this->twig->render($template, [
            'status_code' => $statusCode,
            'exception' => $exception,
            'page_type' => $typePageErreur,
        ]), $statusCode);
    }
}
