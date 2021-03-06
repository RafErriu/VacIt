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


    public function getSollicitatie($id) {
        $sollicitatie = $this->find($id);
        return($sollicitatie);
    }

    public function getSollicitaties($user) {

        $sollicitaties = $this->findBy(array("werknemer" => $user));
        return ($sollicitaties);
    }

    public function saveSollicitatie($params) {
        
    
        $em = $this->getEntityManager();

        $vacatures = $em->getRepository(Vacature::class);
        $users = $em->getRepository(User::class);

        if(isset($params["vacture"])){
            $sollicitatie = $this->find($params["vacature"]);
        }else{
            $sollicitatie = new Sollicitatie();
        }
        $vacature = $vacatures->find($params["vacature_id"]);
        $werknemer = $users->find($params["werknemer"]);

        $sollicitatie->setVacature($vacature);
        $sollicitatie->setUitgenodigd("N");
        $sollicitatie->setDatum(new \DateTime('@'.strtotime('now')));
        $sollicitatie->setWerknemer($werknemer);

        $em->persist($sollicitatie);

        $em->flush();

        return($sollicitatie);
    }

    public function getSolliVacci($vac) {

        $sollicitaties = $this->findBy(array("vacature" => $vac));
        return ($sollicitaties);
    }

    public function verwijderSollicitatie($id) {


        $sollicitatie = $this->find($id);

        $em = $this->getEntityManager();


        $em->remove($sollicitatie);
        $em->flush();

        return("Succes");
    }

    public function uitnodigen($id) {
        $em = $this->getEntityManager();

        $sollicitatie = $this->find($id);
        $uitnodiging = $sollicitatie->getUitgenodigd();

        if($uitnodiging == "Y") {
            $sollicitatie->setUitgenodigd("N");
        }    
        else{
            $sollicitatie->setUitgenodigd("Y");
        }


        
        
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
