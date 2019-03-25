<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formule
 *
 * @ORM\Table(name="formule", indexes={@ORM\Index(name="fk_formule_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Formule
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

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_musiciens", type="integer", nullable=false)
     */
    private $nbMusiciens;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tps_install", type="time", nullable=false)
     */
    private $tpsInstall;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tps_event", type="time", nullable=false)
     */
    private $tpsEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}
