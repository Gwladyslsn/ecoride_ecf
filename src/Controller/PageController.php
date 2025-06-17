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
}


