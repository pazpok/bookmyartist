<?php


namespace App\Repository;


use App\Entity\Formule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FormuleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Formule::class);
    }

    public function findFormule(Formule $formule)
    {
        $qb = $this->createQueryBuilder('f');

        $qb = $qb->where($qb->expr()->eq('f.libelle', true));

        return $qb->setParameter(':formule', false)
            ->getQuery()
            ->getResult();
    }

}