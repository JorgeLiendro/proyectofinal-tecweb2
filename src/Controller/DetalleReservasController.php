<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DetalleReservas Controller
 *
 * @property \App\Model\Table\DetalleReservasTable $DetalleReservas
 */
class DetalleReservasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DetalleReservas->find()
            ->contain(['Reservas', 'Recursos']);
        $detalleReservas = $this->paginate($query);

        $this->set(compact('detalleReservas'));
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Reserva id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleReserva = $this->DetalleReservas->get($id, contain: ['Reservas', 'Recursos']);
        $this->set(compact('detalleReserva'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleReserva = $this->DetalleReservas->newEmptyEntity();
        if ($this->request->is('post')) {
            $detalleReserva = $this->DetalleReservas->patchEntity($detalleReserva, $this->request->getData());
            if ($this->DetalleReservas->save($detalleReserva)) {
                $this->Flash->success(__('The detalle reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->DetalleReservas->Reservas->find('list', limit: 200)->all();
        $recursos = $this->DetalleReservas->Recursos->find('list', limit: 200)->all();
        $this->set(compact('detalleReserva', 'reservas', 'recursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Reserva id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleReserva = $this->DetalleReservas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleReserva = $this->DetalleReservas->patchEntity($detalleReserva, $this->request->getData());
            if ($this->DetalleReservas->save($detalleReserva)) {
                $this->Flash->success(__('The detalle reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->DetalleReservas->Reservas->find('list', limit: 200)->all();
        $recursos = $this->DetalleReservas->Recursos->find('list', limit: 200)->all();
        $this->set(compact('detalleReserva', 'reservas', 'recursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleReserva = $this->DetalleReservas->get($id);
        if ($this->DetalleReservas->delete($detalleReserva)) {
            $this->Flash->success(__('The detalle reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
