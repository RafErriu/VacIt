<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Repository\UserRepository;


class CreateUserCommand extends Command
{

    protected static $defaultName = 'app:import-spreadsheet';
    private $user;


    public function __construct(UserRepository $user) {
        parent::__construct();
        $this->user = $user;
    }

    protected function configure()
    {
        $this
            ->setName('app:import-spreadsheet')
            ->setDescription('Import Excel Spreadsheet')
            ->setHelp('This command allows you to import a spreadsheet')
            ->addArgument('file', InputArgument::REQUIRED, 'Spreadsheet')
        ;
    }

    protected function execute(InputInterface $input,
                                OutputInterface $output)
    {
        $inputFilename = $input->getArgument('file');
        $spreadsheet = IOFactory::load($inputFilename);
        $row = $spreadsheet->getActiveSheet()->removeRow(1);

        $sheetdata = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        foreach($sheetdata as $row)
        {
            if(!$row['C']) {
                die();
            }
            $params = [
            'email' => $row['C'],
            'roles' => ["ROLE_WERKGEVER"],
            'password' => $row['E'],
            'voornaam' => $row['F'],
            'achternaam' => $row['G'],
            'geboortedatum' => $row['H'],
            'telefoonnummer' => $row['I'],
            'adres' => $row['J'],
            'postcode' => $row['K'],
            'record_type' => $row['O']
            ];
 
            $user = $this->user->aanpassenUser($params);

            $output->writeln($params);
        }

    }
}