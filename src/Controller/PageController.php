<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        $this->home();
                        break;
                    case 'register':
                        $this->register();
                        break;
                    case 'contact':
                        $this->contact();
                        break;
                    case 'about':
                        $this->about();
                        break;
                    case 'mentions':
                        $this->mentions();
                        break;
                    case 'dashboardUser':
                        $this->dashboardUser();
                        break;
                    case 'logout':
                        $this->logout();
                        break;
                    case 'history':
                        $this->history();
                        break;
                    case 'updateUser':
                        $this->updateUser();
                        break;
                    case 'updateCar':
                        $this->updateCar();
                        break;
                    case 'addCarpooling':
                        $this->addCarpooling();
                        break;
                    case 'searchCarpooling':
                        $this->searchCarpooling();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                }
            } else {
                throw new \Exception("Aucune action detectée");
            }
        } catch (\Exception $e) {
            $this->render('/errors/default', [
            'error' => $e->getMessage()
        ]);
        }
    }

    protected function home()
    {
        $this->render('/page/home', []);
    }

    protected function register()
    {
        $this->render('/page/register', []);
    }

    protected function contact()
    {
        $this->render('/page/contact', []);
    }

    protected function about()
    {
        $this->render('/page/about', []);
    }

    protected function mentions()
    {
        $this->render('/page/mentions', []);
    }

    protected function dashboardUser()
    {
        $this->render('/page/dashboardUser', []);
    }

    protected function logout()
    {
        $this->render('/logout', []);
    }

    protected function history()
    {
        $this->render('/page/history', []);
    }

    protected function updateUser()
    {
        $this->render('/page/updateUser', []);
    }

    protected function updateCar()
    {
        $this->render('/page/updateCar', []);
    }

    protected function addCarpooling()
    {
        $this->render('/page/addCarpooling', []);
    }

    protected function searchCarpooling()
    {
        $this->render('/page/searchCarpooling', []);
    }
}


