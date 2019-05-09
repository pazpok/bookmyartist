<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fk_reservation_artist2_idx", columns={"artist_id"}), @ORM\Index(name="fk_reservation_artist1_idx", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=false)
     */
    private $dateStart;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=false)
     */
    private $dateEnd;
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
     * @return Reservation
     */
    public function setId(int $id): Reservation
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getDateStart(): ?\DateTime
    {
        return $this->dateStart;
    }
    /**
     * @param \DateTime $dateStart
     * @return Reservation
     */
    public function setDateStart(\DateTime $dateStart): Reservation
    {
        $this->dateStart = $dateStart;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getDateEnd(): ?\DateTime
    {
        return $this->dateEnd;
    }
    /**
     * @param \DateTime $dateEnd
     * @return Reservation
     */
    public function setDateEnd(\DateTime $dateEnd): Reservation
    {
        $this->dateEnd = $dateEnd;
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
     * @return Reservation
     */
    public function setUser(User $user): Reservation
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
     * @return Reservation
     */
    public function setArtist(User $artist): Reservation
    {
        $this->artist = $artist;
        return $this;
    }
}