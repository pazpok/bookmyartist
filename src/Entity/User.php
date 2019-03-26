<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="e-mail_UNIQUE", columns={"e-mail"})}, indexes={@ORM\Index(name="fk_artist_template1_idx", columns={"template_id"}), @ORM\Index(name="fk_user_type1_idx", columns={"type_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @return string
     */
    public function getEMail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEMail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @return mixed
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return (string) $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     * @return User
     */
    public function setPseudo(?string $pseudo): User
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_image", type="string", length=255, nullable=true)
     */
    private $templateImage;

    /**
     * @return string|null
     */
    public function getTemplateImage(): ?string
    {
        return $this->templateImage;
    }

    /**
     * @param string|null $templateImage
     * @return User
     */
    public function setTemplateImage(?string $templateImage): User
    {
        $this->templateImage = $templateImage;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_description", type="text", length=65535, nullable=true)
     */
    private $templateDescription;

    /**
     * @return string|null
     */
    public function getTemplateDescription(): ?string
    {
        return $this->templateDescription;
    }

    /**
     * @param string|null $templateDescription
     * @return User
     */
    public function setTemplateDescription(?string $templateDescription): User
    {
        $this->templateDescription = $templateDescription;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="artist_id", type="string", length=255, nullable=true)
     */
    private $artistId;

    /**
     * @return string|null
     */
    public function getArtistId(): ?string
    {
        return $this->artistId;
    }

    /**
     * @param string|null $artistId
     * @return User
     */
    public function setArtistId(?string $artistId): User
    {
        $this->artistId = $artistId;
        return $this;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="is_artist", type="boolean", nullable=false)
     */
    private $isArtist = '0';

    /**
     * @return bool
     */
    public function isArtist(): bool
    {
        return $this->isArtist;
    }

    /**
     * @param bool $isArtist
     * @return User
     */
    public function setIsArtist(bool $isArtist): User
    {
        $this->isArtist = $isArtist;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @return string|null
     */
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    /**
     * @param string|null $facebook
     * @return User
     */
    public function setFacebook(?string $facebook): User
    {
        $this->facebook = $facebook;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @return string|null
     */
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    /**
     * @param string|null $twitter
     * @return User
     */
    public function setTwitter(?string $twitter): User
    {
        $this->twitter = $twitter;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @return string|null
     */
    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    /**
     * @param string|null $youtube
     * @return User
     */
    public function setYoutube(?string $youtube): User
    {
        $this->youtube = $youtube;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="spotify", type="string", length=255, nullable=true)
     */
    private $spotify;

    /**
     * @return string|null
     */
    public function getSpotify(): ?string
    {
        return $this->spotify;
    }

    /**
     * @param string|null $spotify
     * @return User
     */
    public function setSpotify(?string $spotify): User
    {
        $this->spotify = $spotify;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="soundcloud", type="string", length=255, nullable=true)
     */
    private $soundcloud;

    /**
     * @return string|null
     */
    public function getSoundcloud(): ?string
    {
        return $this->soundcloud;
    }

    /**
     * @param string|null $soundcloud
     * @return User
     */
    public function setSoundcloud(?string $soundcloud): User
    {
        $this->soundcloud = $soundcloud;
        return $this;
    }

    /**
     * @var Template
     *
     * @ORM\ManyToOne(targetEntity="Template")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_id", referencedColumnName="id")
     * })
     */
    private $template;

    /**
     * @return Template
     */
    public function getTemplate(): Template
    {
        return $this->template;
    }

    /**
     * @param Template $template
     * @return User
     */
    public function setTemplate(Template $template): User
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return User
     */
    public function setType(Type $type): User
    {
        $this->type = $type;
        return $this;
    }

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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre(): \Doctrine\Common\Collections\Collection
    {
        return $this->genre;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $genre
     * @return User
     */
    public function setGenre(\Doctrine\Common\Collections\Collection $genre): User
    {
        $this->genre = $genre;
        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @return null (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {

    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {

    }
}
