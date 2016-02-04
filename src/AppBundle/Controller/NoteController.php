<?php

namespace AppBundle\Controller;

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
    }
}
