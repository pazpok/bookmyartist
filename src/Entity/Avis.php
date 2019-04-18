<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Avis
 *
 * @ORM\Table(name="avis", indexes={@ORM\Index(name="fk_avis_user2_idx", columns={"artist_id"}), @ORM\Index(name="fk_avis_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Avis
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
     * @var int|null
     *
     * @ORM\Column(name="star", type="integer", nullable=true)
     */
    private $star;
    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire;
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     * })
     */
    private $artist;
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return Avis
     */
    public function setId(int $id): Avis
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getStar(): ?int
    {
        return $this->star;
    }
    /**
     * @param int|null $star
     * @return Avis
     */
    public function setStar(?int $star): Avis
    {
        $this->star = $star;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }
    /**
     * @param string|null $commentaire
     * @return Avis
     */
    public function setCommentaire(?string $commentaire): Avis
    {
        $this->commentaire = $commentaire;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }
    /**
     * @param \DateTime|null $date
     * @return Avis
     */
    public function setDate(?\DateTime $date): Avis
    {
        $this->date = $date;
        return $this;
    }
    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }
    /**
     * @param User $user
     * @return Avis
     */
    public function setUser(User $user): Avis
    {
        $this->user = $user;
        return $this;
    }
    /**
     * @return User
     */
    public function getArtist(): ?User
    {
        return $this->artist;
    }
    /**
     * @param User $artist
     * @return Avis
     */
    public function setArtist(User $artist): Avis
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setDate(new \DateTime());
    }

}