<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'createAdmin':
                        $this->createAdmin();
                        break;
                    case 'homeAdmin':
                        $this->homeAdmin();
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


    protected function createAdmin()
    {
        $this->render('/Entity/createAdmin', []);
    }

    protected function homeAdmin()
    {
        $this->render('/Templates/page/admin/homeAdmin', []);
    }
}





