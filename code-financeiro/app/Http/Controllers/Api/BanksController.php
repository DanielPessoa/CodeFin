<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Repositories\BankRepository;
use Illuminate\Http\Request;

use CodeFin\Http\Requests;

class BanksController extends Controller
{
     /**
     * @var BankRepository
     */
    private $repository;

    public function __construct(BankRepository $repository)
    {
         $this->repository = $repository;
    }
    public function index(){
        return $this->repository->all();
    }


}
