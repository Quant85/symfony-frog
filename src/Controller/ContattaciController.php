<?php

namespace App\Controller;

use App\Entity\Messaggio;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;

class ContattaciController extends AbstractController
{
//@Route("/contattaci", name="contattaci")
    /**
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    //#[Route('/contattaci', name: 'contattaci')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        /** @var Messaggio $messaggio */
        $messaggio = new Messaggio();

        /** @var FormInterface $formMessaggio */
        $formMessaggio = $this->createForm(MessageType::class, $messaggio);
        $formMessaggio->handleRequest($request);
        if ($formMessaggio->isSubmitted() && $formMessaggio->isValid()) {

            /** @var Messaggio $messaggio */
            $messaggio = $formMessaggio->getData();
            $entityManager->persist($messaggio);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Messaggio inviato con successo!'
            );

            return $this->redirectToRoute('index');
        }
        return $this->render('contattaci/index.html.twig', [
            'controller_name' => 'Controller Contattaci',
            'message_form' => $formMessaggio->createView(),
        ]);
    }
}
