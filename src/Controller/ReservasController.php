<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 */
class ReservasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Reservas->find()
            ->contain(['Users', 'Recursos']);
        $reservas = $this->paginate($query);

        $this->set(compact('reservas'));
    }

    /**
     * View method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserva = $this->Reservas->get($id, contain: ['Users', 'Recursos']);
        $this->set(compact('reserva'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserva = $this->Reservas->newEmptyEntity();
        if ($this->request->is('post')) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $users = $this->Reservas->Users->find('list', limit: 200)->all();
        $recursos = $this->Reservas->Recursos->find('list', limit: 200)->all();
        $this->set(compact('reserva', 'users', 'recursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserva = $this->Reservas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $users = $this->Reservas->Users->find('list', limit: 200)->all();
        $recursos = $this->Reservas->Recursos->find('list', limit: 200)->all();
        $this->set(compact('reserva', 'users', 'recursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if ($this->Reservas->delete($reserva)) {
            $this->Flash->success(__('The reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
