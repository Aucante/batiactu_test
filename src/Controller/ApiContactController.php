<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
    ): JsonResponse
    {
        return $this->json($contactRepository->findAll(), 200, [], ['groups' => 'contact:read']);
    }

    /**
     * @Route("/{id}", name="item_get", methods={"GET"})
     */
    public function item(
        Contact $contact
    ): JsonResponse
    {
        return $this->json($contact, 200, [], ['groups' => 'contact:read']);
    }

    /**
     * @Route(name="post", methods={"POST"})
     */
    public function post(
        Request $request,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ): JsonResponse
    {

        $contact = $serializer->deserialize($request->getContent(), Contact::class, 'json');
        $entityManager->persist($contact);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($contact, "json", ["groups" => 'contact:read']),
            JsonResponse::HTTP_CREATED,
            [],
            true
        );
    }
}
