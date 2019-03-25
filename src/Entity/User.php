<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="e-mail_UNIQUE", columns={"e-mail"})}, indexes={@ORM\Index(name="fk_artist_template1_idx", columns={"template_id"}), @ORM\Index(name="fk_user_type1_idx", columns={"type_id"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="e-mail", type="string", length=255, nullable=false)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_image", type="string", length=255, nullable=true)
     */
    private $templateImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_description", type="text", length=65535, nullable=true)
     */
    private $templateDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="artist_id", type="string", length=255, nullable=true)
     */
    private $artistId;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_artist", type="boolean", nullable=false)
     */
    private $isArtist = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @var string|null
     *
     * @ORM\Column(name="spotify", type="string", length=255, nullable=true)
     */
    private $spotify;

    /**
     * @var string|null
     *
     * @ORM\Column(name="soundcloud", type="string", length=255, nullable=true)
     */
    private $soundcloud;

    /**
     * @var \Template
     *
     * @ORM\ManyToOne(targetEntity="Template")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_id", referencedColumnName="id")
     * })
     */
    private $template;

    /**
     * @var \Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="user")
     * @ORM\JoinTable(name="user_has_genre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     *   }
     * )
     */
    private $genre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
