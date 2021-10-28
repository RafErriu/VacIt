<?php

namespace App\Repository;

use App\Entity\Vacature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vacature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vacature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vacature[]    findAll()
 * @method Vacature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vacature::class);
    }

    public function getAllVacatures() {
        $vacatures = $this->findAll();
        return($vacatures);
    }

    public function getVacature($id)
    {
        $vacature = $this->find($id);
        return ($vacature);
    }

    public function bedrijfVacatures($werkgever_id) {
        $vacatures = $this->findBy(array("werkgever" => $werkgever_id));
        return($vacatures);
    }
    
    public function getVacatureWG($user) {

        $vacatures = $this->findBy(array("werkgever" => $user));
        return ($vacatures);
    }

    public function nieuweVacature($vacatures){
        $vacature = new Vacature();
        $vacature->setTitel($vacatures["titel"]);
        $vacature->setDatum(new \DateTime);
        $vacature->setNiveau($vacatures["niveau"]);
        $vacature->setOmschrijving($vacatures["omschrijving"]) ;
        $vacature->setSysteem($vacatures["systeem_id"]);
        $vacature->setWerkgever($vacatures["werkgever_id"]);

        $em = $this->getEntityManager();
        $em->flush();
           
        
        return ($vacatures);
        echo "Vacature toegevoegd!";

    }

    // /**
    //  * @return Vacature[] Returns an array of Vacature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vacature
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
