<?php

namespace App\Controller;

use App\Repository\SupportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SupportController extends Controller {

    /**
     * @var SupportRepository
     */
    private $supportRepository;

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(SupportRepository $supportRepository, \Psr\Log\LoggerInterface $logger) {
        $this->supportRepository = $supportRepository;
        $this->logger = $logger;
    }

    /**
     * @Route(path = "/support", name = "support_list")
     * @return Response
     */
    public function index(): Response {
        $supports = $this->supportRepository->getNumberSupport(5);
        $this->logger->info("Il y a " . count($supports) . " demandes de support.");
        return $this->render('support/index.html.twig', [
                    'supports' => $supports
        ]);
    }

    /**
     * @Route(
     *  path = "/support/{id}", 
     *  name = "support_show", 
     *  methods={ "GET" }
     * )
     * @return Response
     */
    public function show($id): Response {
        $support = $this->supportRepository->find($id);
        if (!$support) {
            throw $this->createNotFoundException(
                    sprintf("Le support %s est introuvable", $id)
            );
        }
        return $this->render('support/show.html.twig', [
                    "support" => $support
        ]);
    }

}
