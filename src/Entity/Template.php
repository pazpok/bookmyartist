<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Template
 *
 * @ORM\Table(name="template")
 * @ORM\Entity
 */
class Template
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;


}
