<?php

namespace App\Controller\API;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        SerializerInterface $serializer,
        UrlGeneratorInterface $generator,
        ValidatorInterface $validator
    ): JsonResponse {

        $contact = $serializer->deserialize($request->getContent(), Contact::class, 'json');
        $errors = $validator->validate($contact);
        if ($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }
        $entityManager->persist($contact);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($contact, "json", ["groups" => 'contact:read']),
            JsonResponse::HTTP_CREATED,
            ["Location" => $generator->generate("api_contact_item_get", ["id" => $contact->getId()])],
            true
        );
    }

    /**
     * @Route("/{id}", name="put", methods={"PUT"})
     */
    public function put(
        Request $request,
        Contact $contact,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ): JsonResponse {

        $serializer->deserialize(
            $request->getContent(),
            Contact::class,
            'json',
            [AbstractNormalizer::OBJECT_TO_POPULATE => $contact]
        );
        $errors = $validator->validate($contact);

        if ($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }
        $entityManager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(
        Contact $contact,
        EntityManagerInterface $entityManager
    ): JsonResponse {

        $entityManager->remove($contact);
        $entityManager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
