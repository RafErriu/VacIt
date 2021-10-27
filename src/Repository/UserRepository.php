<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
    
        parent::__construct($registry, User::class);
    }
    public function getAllUsers() {
        $users = $this->findAll();
        return($users);
    }

    public function getOneUser($id) {
        $user = $this->find($id);
        return($user);
    }

    public function aanpassenUser($params){

        $em = $this->getEntityManager();

        if(isset($params['id'])) {
            $user = $this->find($params['id']);
        }
        else {
            $user = new User();
        }

            $user->setVoornaam($params['voornaam']);
            $user->setAchternaam($params['achternaam']);
            $user->setEmail($params['email']);
            $user->setGeboortedatum($params["geboortedatum"]);
            $user->setTelefoonnummer($params["telefoonnummer"]);
            $user->setAdres($params["adres"]);
            $user->setPostcode($params["postcode"]);
            $user->setWoonplaats($params['woonplaats']);
            $user->setMotivatie($params["motivatie"]);


        $em->persist($user);
        $em->flush();
        
        return ($user);
    }


    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush(); 
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
