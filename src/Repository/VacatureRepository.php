<?php

namespace App\Repository;

use App\Entity\Systeem;
use App\Entity\User;
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

    public function nieuweVac($params){


        $vacature = new Vacature();

        $em = $this->getEntityManager();

        $systeemRep = $em->getRepository(Systeem::class);
        $werkgeverRep = $em -> getRepository(User::class);


        $werkgever = $werkgeverRep->find($params["werkgever_id"]);
        $systeem = $systeemRep->find($params["systeem"]);

        $vacature->setSysteem($systeem);
        $vacature->setWerkgever($werkgever);
        $vacature->setTitel($params["titel"]);
        $vacature->setDatum(new \DateTime);
        $vacature->setNiveau($params["niveau"]);
        $vacature->setOmschrijving($params["omschrijving"]) ;

        $em->persist($vacature);
        $em->flush();
           
        
        return ($vacature);
    }

    public function verwijderVacature($id) {


        $vacature = $this->find($id);

        $em = $this->getEntityManager();

        $em->remove($vacature);
        $em->flush();

        return("Succes");
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
