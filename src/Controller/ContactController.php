<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="app_contact")
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {

        $contact = new Contact();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('success', ['id' => $contact->getId()]);
        }

        return $this->render('contact/index.html.twig', [
             'form' => $contactForm->createView(),
        ]);
    }

    /**
     * @Route("/success/{id}", name="success")
     */
    public function success(
        Contact $contact
    ): Response
    {
        return $this->render('contact/success.html.twig', [
            'contact' => $contact
        ]);
    }
}
