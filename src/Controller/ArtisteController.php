<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

/**11
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{
    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(ArtisteRepository $ArtisteRepository): Response
    {
        return $this->render('artiste/index.html.twig', [
            'artistes' => $ArtisteRepository->findAll(),
        ]);
    }
     /**
     * @Route("/artiste/create", name="artiste_create", methods={"POST", "GET"})
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            $artiste = new Artiste;
            $artiste->setNomArtiste($data['nom']);
            $artiste->setDescriptionArtiste($data['description']);
            $em->persist($artiste);
            $em->flush();

            return $this->redirectToRoute('artiste_index');
        }
        return $this->render('artiste/create.html.twig');
    }
}
