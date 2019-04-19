<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="e-mail_UNIQUE", columns={"e-mail"})}, indexes={@ORM\Index(name="fk_artist_template1_idx", columns={"template_id"}), @ORM\Index(name="fk_user_type1_idx", columns={"type_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Vich\Uploadable()
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
    /**
     * @var int
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @return int
     */
    public function getId(): ?int
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
     * @Assert\NotBlank(groups={"registration"})
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
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     * @Assert\Image(mimeTypes={ "image/jpeg", "image/jpg", "image/png"  }, mimeTypesMessage = "Extension valide : .jpeg .png .jpg")
     */
    private $picture;
    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    /**
     * @param string|null $picture
     * @return User
     */
    public function setPicture(?string $picture): User
    {
        $this->picture = $picture;
        return $this;
    }
    /**
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="picture")
     * @var File
     * @Assert\Image(mimeTypes={ "image/jpeg", "image/jpg", "image/png"  }, mimeTypesMessage = "Extension valide : .jpeg .png .jpg", groups = {"create"})
     */
    private $pictureFile;
    /**
     * @return File
     */
    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }
    /**
     * @param File $picture
     * @throws \Exception
     */
    public function setPictureFile(File $picture = null): void
    {
        $this->pictureFile = $picture;
        if ($picture) {
            $this->updatedAt = new \DateTime('now');
        }
    }
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     * @return User
     */
    public function setUpdatedAt(?\DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="template_title", type="string", length=255, nullable=true)
     */
    private $templateTitle;

    /**
     * @return string|null
     */
    public function getTemplateTitle(): ?string
    {
        return $this->templateTitle;
    }

    /**
     * @param string|null $templateTitle
     * @return User
     */
    public function setTemplateTitle(?string $templateTitle): User
    {
        $this->templateTitle = $templateTitle;
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
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="templateImage")
     * @var File
     * @Assert\Image(mimeTypes={ "image/jpeg", "image/jpg", "image/png"  }, mimeTypesMessage = "Extension valide : .jpeg .png .jpg", groups = {"create"})
     */
    private $templateImageFile;

    /**
     * @return File
     */
    public function getTemplateImageFile(): ?File
    {
        return $this->templateImageFile;
    }

    /**
     * @param File $templateImage
     * @throws \Exception
     */
    public function setTemplateImageFile(File $templateImage = null)
    {
        $this->templateImageFile = $templateImage;
        if ($templateImage) {
            $this->updatedAt = new \DateTime('now');
        }
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
     * @var string|null
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;
    /**
     * @return string|null
     */
    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }
    /**
     * @param string|null $localisation
     * @return User
     */
    public function setLocalisation(?string $localisation): User
    {
        $this->localisation = $localisation;
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
     *   @ORM\JoinColumn(name="template_id", referencedColumnName="id", )
     * })
     */
    private $template;
    /**
     * @return Template
     */
    public function getTemplate(): ?Template
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
    public function getType(): ?Type
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
     * @var Collection
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
     * @return Collection
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }
    /**
     * @param Collection $genre
     * @return User
     */
    public function setGenre(Collection $genre): User
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Formule", mappedBy="user", cascade={"persist"})
     *
     */
    private $formules;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->formules = new ArrayCollection();
    }

    /**
     * @return Collection|Formule[]
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    /**
     * @param mixed $formules
     * @return User
     */
    public function setFormules(Collection $formules)
    {
        $this->formules = $formules;
        return $this;
    }

    /**
     * @param Formule $formule
     *
     * @return User
     */
    public function addFormule(Formule $formule)
    {
        $this->formules[] = $formule;
        $formule->setUser($this);
        return $this;
    }

    /**
     * @param Formule $formule
     */
    public function removeFormule(Formule $formule)
    {
        $this->formules->removeElement($formule);
    }

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param mixed $roles
     * @return User
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
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

    public function __toString()
    {
        return $this->email;
    }

}