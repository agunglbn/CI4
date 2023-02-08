<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\M_user;
use App\Models\Jemaat;
use App\Models\Inventory;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Gallery;
use App\Models\Divisi;
use App\Models\Keuangan;
use App\Models\AuthGroups;
use App\Models\Berita;
use Myth\Auth\Models\UserModel;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    protected $userModel, $gallery, $peminjaman, $inventory, $divisi, $keuangan, $db, $builder, $model, $jemaat, $validation, $kategori, $berita;






    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'form', 'url', 'text', 'costum'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->model = new M_user;
        $this->keuangan = new Keuangan;
        $this->peminjaman = new Peminjaman;
        $this->userModel = new UserModel;
        $this->berita = new Berita;
        $this->inventory = new Inventory;
        $this->jemaat = new Jemaat;
        $this->kategori = new Kategori;
        $this->gallery = new Gallery;
        $this->validation = \Config\Services::validation();
        helper('url', 'text');
        // E.g.: 
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->db = \Config\Database::connect();
    }
}
