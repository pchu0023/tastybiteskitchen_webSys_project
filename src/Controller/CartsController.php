<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Carts Controller
 *
 *  @property \App\Model\Table\ProductsTable $Products
 */
class CartsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['index']);
    }

    public $modelClass = '';


   public function index()
   {

   }


    public function view($id = null)
    {

    }

}
