<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Sollicitatie;
use App\Entity\Vacature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sollicitatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sollicitatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sollicitatie[]    findAll()
 * @method Sollicitatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SollicitatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sollicitatie::class);
    }

    public function getSollicitaties($user) {

        $sollicitaties = $this->findBy(array("werknemer" => $user));
        return ($sollicitaties);
    }

    public function saveSollicitatie($params) {
        

        $sollicitatie = new Sollicitatie();

        $em = $this->getEntityManager();

        $vacatures = $em->getRepository(Vacature::class);
        $users = $em->getRepository(User::class);

        $vacature = $vacatures->find($params["vacature_id"]);
        $werknemer = $users->find($params["werknemer"]);

        $sollicitatie->setVacature($vacature);
        $sollicitatie->setUitgenodigd($params['uitgenodigd']);
        $sollicitatie->setDatum($params['datum']);
        $sollicitatie->setWerknemer($werknemer);

        $em->persist($sollicitatie);

        $em->flush();

        return($sollicitatie);
    }



    
    // /**
    //  * @return Sollicitatie[] Returns an array of Sollicitatie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sollicitatie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
