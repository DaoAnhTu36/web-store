<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\WebsiteConfigModel;

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
     * @var list<string>
     */
    protected $helpers = ['response'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    protected $lang;
    protected $websiteConfigModel;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        helper("url");
        $this->websiteConfigModel = new WebsiteConfigModel();


        $session = session();
        if ($session->has('site_lang')) {
            $this->lang = $session->get('site_lang');
        } else {
            $this->lang = $this->request->getLocale();
        }

        service('request')->setLocale($this->lang);
        if (!isset(session()->get('web_configs')['site_name_admin'])) {
            $webConfigs = $this->websiteConfigModel->getAllConfigs();
            $session->set('web_configs', $webConfigs);
        }
    }

    // app/Controllers/BaseController.php

    protected function checkLogin()
    {
        $session = session();
        if (!$session->get('is_logged_in')) {
            return redirect()->to('admin/account/login')->send();
        }
    }
}
