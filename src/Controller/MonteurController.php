<?php
namespace Controller;

use Model\MotherBoard;
use PDO;


class MonteurController extends AbstractController
{
    public function getContent(): array
    {


        return [];
    }

    public function getFileName(): string
    {
        return 'monteur';
    }

    public function getPageTitle(): string
    {
        return 'Monteur !';
    }
}