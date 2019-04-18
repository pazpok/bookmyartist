<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity
 */
class Genre
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="genre")
     */
    private $user;
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return Genre
     */
    public function setId(int $id): Genre
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }
    /**
     * @param string $libelle
     * @return Genre
     */
    public function setLibelle(string $libelle): Genre
    {
        $this->libelle = $libelle;
        return $this;
    }
    /**
     * @return Collection
     */
    public function getUser(): Collection
    {
        return $this->user;
    }
    /**
     * @param Collection $user
     * @return Genre
     */
    public function setUser(Collection $user): Genre
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->libelle;
    }
}