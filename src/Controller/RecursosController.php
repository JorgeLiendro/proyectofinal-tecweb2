<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Recursos Controller
 *
 * @property \App\Model\Table\RecursosTable $Recursos
 */
class RecursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Recursos->find();
        $recursos = $this->paginate($query);

        $this->set(compact('recursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Recurso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recurso = $this->Recursos->get($id, contain: ['Reservas']);
        $this->set(compact('recurso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recurso = $this->Recursos->newEmptyEntity();
        if ($this->request->is('post')) {
            $recurso = $this->Recursos->patchEntity($recurso, $this->request->getData());
            if ($this->Recursos->save($recurso)) {
                $this->Flash->success(__('The recurso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recurso could not be saved. Please, try again.'));
        }
        $this->set(compact('recurso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recurso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recurso = $this->Recursos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recurso = $this->Recursos->patchEntity($recurso, $this->request->getData());
            if ($this->Recursos->save($recurso)) {
                $this->Flash->success(__('The recurso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recurso could not be saved. Please, try again.'));
        }
        $this->set(compact('recurso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recurso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recurso = $this->Recursos->get($id);
        if ($this->Recursos->delete($recurso)) {
            $this->Flash->success(__('The recurso has been deleted.'));
        } else {
            $this->Flash->error(__('The recurso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
