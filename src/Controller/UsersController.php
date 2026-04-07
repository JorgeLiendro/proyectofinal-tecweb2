<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\I18n;
use Authentication\PasswordHasher\DefaultPasswordHasher;
//use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find(); 
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el usuario. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido editado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar el usuario. Por favor, inténtelo de nuevo'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado correctamente'));
        } else {
            $this->Flash->error(__('No se pudo eliminar al usuario, intèntelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    //metodo login
    public function login()
    {
        $this->viewBuilder()->setLayout("login");
        
        if ($this->request->is('post')) {

            $correo = $this->request->getData('correo');
            $password = $this->request->getData('password');
            $idioma = $this->request->getData('idioma');

            // Buscar usuario por correo
            $user = $this->Users->find()
                ->where(['correo' => $correo])
                ->first();

            if ($user) {
                $hasher = new DefaultPasswordHasher();

                if ($hasher->check($password, $user->password)) {

                    // Guardar sesión del usuario logeado
                    $this->request->getSession()->write('Auth', $user);

                    //guarda idioma en sesion
                    if (!empty($idioma)) {
                        $this->request->getSession()->write('Config.language', $idioma);
                        I18n::setLocale($idioma);
                    }

                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'index'
                    ]);
                }
            }

            $this->Flash->error('Correo o contraseña incorrectos');
        }
    }

    //metodo cerrar sesion

    public function logout()
    {
        $this->request->getSession()->destroy();
        return $this->redirect(['action' => 'login']);
    }
}
