<?php

namespace App\Controller;

use App\Dto\ResponseDto;
use App\Service\Serializer\ResponseSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(private ResponseSerializer $responseSerializer)
    {
    }

    #[Route('/', name: 'main')]
    public function __invoke(): Response
    {
        $responseDto = new ResponseDto('Lorem ipsum');

        $serializedData = $this->responseSerializer->serialize($responseDto);

        return new Response($serializedData, 200, [
            'Content-Type' => 'application/json',
        ]);
    }
}
