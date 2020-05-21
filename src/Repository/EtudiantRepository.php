<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Etudiant;
use App\Entity\EtudiantSearch;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }
    /**
     * @return Query
     */
    public function findAllVisibleQuery(EtudiantSearch $search): Query
    {
        $query = $this->findAllQuery();
        if($search -> getNom()){
            $query = $query->andWhere('p.nom <= :nom')
                            ->setParameter('maxprice', $search->getNom());
        }
        if($search -> getPrenom()){
            $query = $query->andWhere('p.prenom == :prenom')
                            ->setParameter('minsurface', $search->getPrenom());
        }

        return $query->getQuery();
    }

    // /**
    //  * @return Etudiant[] Returns an array of Etudiant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Etudiant
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    private function findAllQuery():QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }
}
