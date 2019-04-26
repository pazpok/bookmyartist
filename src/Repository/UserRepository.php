<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findUser(User $user): array
    {
        $qb = $this->createQueryBuilder('u');

        $qb = $qb->where($qb->expr()->eq('u.is_artist', true));

        return $qb->setParameter(':user', false)
            ->getQuery()
            ->getResult();
    }

    public function searchBy(string $sq)
    {
        $qb = $this->createQueryBuilder('u');
        $qb = $qb
            ->innerJoin('u.genre', 'g')
            ->innerJoin('u.type', 't')
            ->where($qb->expr()->orX(
                    $qb->expr()->eq('g.libelle', ':sq'),
                    $qb->expr()->eq('u.artistId', ':sq'),
                    $qb->expr()->eq('t.libelle', ':sq'),
                    $qb->expr()->eq('u.localisation', ':sq'))
            );

        return $qb->setParameter(':sq', $sq)->getQuery()->getResult();
    }

    public function filterBy($type, $localisation, $genre)
    {
        $qb = $this->createQueryBuilder('u');
        $qb =$qb
            ->innerJoin('u.type', 't')
            ->innerJoin('u.formules', 'f')
            ->innerJoin('u.genre', 'g')
            ;

        if ($type != null && $localisation != null) {
            $qb = $qb->andWhere($qb->expr()->eq('t.libelle', ':type'))
                    ->andWhere($qb->expr()->eq('u.localisation', ':localisation'))
                    ->andWhere($qb->expr()->eq('g.libelle', ':genre'))
                ->setParameters([':type' => $type, ':localisation' => $localisation, ':genre' => $genre]);
        }

        return $qb->getQuery()->getResult();

    }
}
