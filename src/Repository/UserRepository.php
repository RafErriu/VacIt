<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry, UserPasswordHasherInterface $passwordHasher)
    {
    
        parent::__construct($registry, User::class);
        $this->hasher = $passwordHasher;
    }
    public function getAllUsers() {
        $users = $this->findAll();
        return($users);
    }

    public function getOneUser($id) {
        $user = $this->find($id);
        return($user);
    }

    public function getTheRecordType($record_type) {
        $record = $this->find($record_type);
        return($record);
    }

    public function aanpassenUser($params){

            
        
        $em = $this->getEntityManager();
        if(isset($params['id'])) {
            $user = $this->find($params['id']);
        }
        else {
            $user = new User();
        }
        if(isset($params["roles"]))
        {
            $user->setRoles($params["roles"]);
        }
        if(isset($params["voornaam"]))
        {
            $user->setVoornaam($params["voornaam"]);
        }
        if(isset($params["achternaam"]))
        {
            $user->setAchternaam($params["achternaam"]);
        }
        if(isset($params["password"]))
        {
            $user->setPassword(
            $this->hasher->hashPassword(
                $user,
                $params["password"])
            );
        }
        if(isset($params["email"]))
        {
            $user->setEmail($params["email"]);
        }
        if(isset($params["geboortedatum"]))
        {
        $user->setGeboortedatum($params['geboortedatum']);
        }
        if(isset($params["telefoonnummer"]))
        {
        $user->setTelefoonnummer($params['telefoonnummer']);   
        }
        if(isset($params["adres"]))
        {
        $user->setAdres($params['adres']);
        }
        if(isset($params["postcode"]))
        {
        $user->setPostcode($params['postcode']);
        }
        if(isset($params["woonplaats"]))
        {
        $user->setWoonplaats($params['woonplaats']);
        }
        if(isset($params["cv"]))
        {
        $user->setCv($params['cv']);
        }
        if(isset($params["motivatie"]))
        {
        $user->setMotivatie($params['motivatie']);
        }
        if(isset($params["record_type"]))
        {
        $user->setRecordType($params['record_type']);
        }

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
