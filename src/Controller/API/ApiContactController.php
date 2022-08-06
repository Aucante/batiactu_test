<?php

namespace App\Controller\API;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/contact", name="api_contact_")
 */
class ApiContactController extends AbstractController
{
    /**
     * @Route(name="get", methods={"GET"})
     */
    public function index(
        ContactRepository $contactRepository
    ): Response
    {
        return $this->json($contactRepository->findAll(), 200, [], ['groups' => 'contact:read']);
    }

    /**
     * @Route("/{id}", name="item_get", methods={"GET"})
     */
    public function item(
        Contact $contact
    ): Response
    {
        return $this->json($contact, 200, [], ['groups' => 'contact:read']);
    }
}
