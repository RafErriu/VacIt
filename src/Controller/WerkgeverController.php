<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\User;
use App\Entity\Systeem;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;




/**
 * @Route("/werkgever")
 */
class WerkgeverController extends BaseController
{
    /**
     * @Route("/vacatures/{id}", name= "werkgever")]
     * @Template()
     */
    public function ophalenVacaturesWG($id)
    {

        $vacatures = $this->vac->getVacatureWG($id);
    

        return $this->render('werkgever/index.html.twig', ['vacatures' => $vacatures]);
    }

    /**
     * @Route("/profielWG/", name= "profielWG")]
     * @Template()
     */
    public function werkgeverProfiel()
    {
        $id = $this->getUser()->getId();
        $user = $this->use->getOneUser($id);
    

        return $this->render('werkgever/profielWG.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/nieuweVacature", name= "nieuweVacature")]
     * @Template()
     */
    public function nieuweVacature()
    {
        $user = $this->getUser();
        $system = $this->sys->getAllSysteem();

        return ($this->render('werkgever/nieuweVac.html.twig',  ['system' => $system]));
    }

        /**
     * @Route("/vacatureOpslaan", name= "vacatureOpslaan")]
     * @Template()
     */
    public function vacatureOpslaan(Request $request)
    {
        $vacatures = $request->request->all();
        
        $system = $this->sys->getAllSysteem();
        $werkgever = $this->getUser();
        $werkgever_id = $werkgever->getId();
        
        $vacature = $this->vac->nieuweVac($vacatures);

        $id = $this->getUser()->getId();
        $vacatures = $this->vac->getVacatureWG($id);

        return $this->render('werkgever/index.html.twig', ['vacatures' => $vacatures]);
    }


  /**
   * @Route("/upload-excel", name="excel")
   *  @param Request $request
     * @throws \Exception
    */
    /*
    public function xslx(Request $request)
    {
        
   $file = $request->files->get('file.xlsx'); // get the file from the sent request
   
   $fileFolder = __DIR__ . '/public/assets/excel/';  //choose the folder in which the uploaded file will be stored
  
   $filePathName = md5(uniqid()) . $file->getClientOriginalName();
      // apply md5 function to generate an unique identifier for the file and concat it with the file extension  
            try {
                $file->move($fileFolder, $filePathName);
            } catch (FileException $e) {
                dd($e);
            }
    $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file 
    $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line 
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
    dd($sheetData);
    $entityManager = $this->getDoctrine()->getManager(); 
    foreach ($sheetData as $Row) 
        { 

            $id =$Row['id'];
            $email= $Row['email'];     // store the email on each iteration
            $roles = $Row['roles']; 
            $password = $Row['password']; 
            $voornaam = $Row['voornaam']; // store the first_name on each iteration 
            $achternaam = $Row['achternaam']; // store the last_name on each iteration
            $geboortedatum = $Row['geboortedatum'];   // store the phone on each iteration
            $telefoonnummer = $Row['telefoonnummer']; 
            $adres = $Row['adres']; 
            $postcode = $Row['postcode']; 
            $woonplaats = $Row['woonplaats']; 
            $motivatie = $Row['motivatie']; 
            $cv = $Row['cv']; 
            $record_type = $Row['record_type']; 
            $foto = $Row['foto']; 

            $user_existant = $entityManager->getRepository(User::class)->findOneBy(array('email' => $email)); 
                // make sure that the user does not already exists in your db 
            if (!$user_existant) 
             {   
                $user = new User(); 
                $user->setId($id);
                $user->setEmail($email);
                $user->setRoles($roles);
                $user->setPassword($password);
                $user->setVoornaam($voornaam);           
                $user->setAchternaam($Achternaam);
                $user->setgeboortedatu($geboortedatum);
                $user->setTelefoonnummer($telefoonnummer);
                $user->setAdres($adres);
                $user->setPostcode($postcode);
                $user->setWoonplaats($woonplaats);
                $user->setMotivatie($motivatie);
                $user->setCv($cv);
                $user->setRecordType($record_type);
                $user->setFoto($fot);


                $entityManager->persist($user); 
                $entityManager->flush(); 
                 // here Doctrine checks all the fields of all fetched data and make a transaction to the database.
             } 
        } 
    return $this->json('users registered', 200); 
}
*/

    
}
