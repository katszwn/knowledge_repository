<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Note;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NoteController extends Controller
{
    /**
     * @Route("/note")
     */
    public function indexAction()
    {
      $notes = $this->getDoctrine()
            ->getRepository('AppBundle:Note')
            ->findAll();

        return $this->render(
            'note/index.html.twig',
            array('notes' => $notes)
        );
    }
}
