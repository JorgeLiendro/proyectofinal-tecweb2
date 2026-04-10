<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    //proteger paginas
    

public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $session = $this->request->getSession();
    $controller = $this->request->getParam('controller');
    $action = $this->request->getParam('action');

    //  IDIOMA GLOBAL
    $idioma = $session->read('Config.language') ?? 'es';
    I18n::setLocale($idioma);

    // PERMITIR LOGIN Y LOGOUT
    //if (!$session->check('Auth') && !in_array($action, ['login', 'logout'])) {
    if (!$session->check('Auth') && !in_array($action, ['login', 'logout'])) {
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    // 🚫 SI NO HAY SESIÓN, NO SEGUIMOS
    if (!$session->check('Auth')) {
        return;
    }

    $rol = $session->read('Auth.rol_id');

    // 👤 CLIENTE
    if ($rol == 2) {

        // bloquear Users EXCEPTO logout
        if ($controller == 'Users' && $action != 'logout') {
            return $this->redirect(['controller' => 'Reservas', 'action' => 'index']);
        }

        // bloquear Recursos y Roles
        if (in_array($controller, ['Recursos', 'Roles'])) {
            return $this->redirect(['controller' => 'Reservas', 'action' => 'index']);
        }

        // bloquear editar y eliminar reservas
        if ($controller == 'Reservas' && in_array($action, ['edit', 'delete'])) {
            return $this->redirect(['action' => 'index']);
        }
    }
}

    /*
    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $session = $this->request->getSession();
    $controller = $this->request->getParam('controller');
    $action = $this->request->getParam('action');

    if ($session->check('Config.language')) {
        I18n::setLocale($session->read('Config.language'));
    } else {
        I18n::setLocale('es'); // idioma por defecto
    }
    
    //  permitir login y logout SIEMPRE
    if (!$session->check('Auth') && !in_array($action, ['login', 'logout'])) {
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    // si no hay sesión, no seguir evaluando roles
    if (!$session->check('Auth')) {
        return;
    }

    $rol = $session->read('Auth.rol_id');

    // CLIENTE
    if ($rol == 2) {

        // bloquear Users EXCEPTO logout
        if ($controller == 'Users' && $action != 'logout') {
            return $this->redirect(['controller' => 'Reservas', 'action' => 'index']);
        }
        
        //bloquear recursos y roles
        if (in_array($controller, ['Recursos', 'Roles'])) {
            return $this->redirect(['controller' => 'Reservas', 'action' => 'index']);
        }

        // bloquear Recursos  
        //if ($controller == 'Recursos') {
        //    return $this->redirect(['controller' => 'Reservas', 'action' => 'index']);
        //}

        //  bloquear editar y eliminar reservas
        if ($controller == 'Reservas' && in_array($action, ['edit', 'delete'])) {
            return $this->redirect(['action' => 'index']);
        }
    }
}
    */


}
