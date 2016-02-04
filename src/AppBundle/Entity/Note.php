<?php
// src/AppBundle/Entity/Note.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="note")
 */
class Note
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="longtext")
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="notes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_public;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }
}
