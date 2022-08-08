<?php

namespace App\Controller\API;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class ApiLoginController extends AbstractController
{
    /**
     * @Route("/api/connexion", name="api_connexion")
     */
    public function login(
        Request $request,
        UserRepository $userRepository
    ): Response
    {
        return $this->json(['success' => 'Vous etes authentifié']);
    }
}
