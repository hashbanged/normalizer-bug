<?php

namespace App\Controller;

use App\Dto\ResponseDto;
use App\Service\Serializer\DtoSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(private DtoSerializer $dtoSerializer)
    {
    }

    #[Route('/', name: 'main')]
    public function __invoke(): Response
    {
        $responseDto = new ResponseDto('Lorem ipsum');

        $serializedData = $this->dtoSerializer->serialize($responseDto);

        return new Response($serializedData, 200, [
            'Content-Type' => 'application/json',
        ]);
    }
}
