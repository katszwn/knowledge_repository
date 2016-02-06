<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Note;
use AppBundle\Form\NoteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/note/new", name="note_new")
     */
    public function newAction(Request $request)
    {
      $note = new Note();
      $form = $this->createForm(new NoteType(), $note);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $note->setUserId($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($note);
        $em->flush();
	return new Response('Created note id '.$note->getId());
      };
      return $this->render(
        'note/new.html.twig',
        array('form' => $form->createView())
      );     
    }
}
