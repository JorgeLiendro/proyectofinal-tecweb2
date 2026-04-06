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
            ->contain(['Users', 'DetalleReservas.Recursos']);
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
        $reserva = $this->Reservas->get($id, contain: ['Users', 'DetalleReservas.Recursos']);
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

        $session = $this->request->getSession();
        $carrito = $session->read('Carrito') ?? [];

        //  si no hay recursos, no guardar
        if (empty($carrito)) {
            $this->Flash->error('Debe agregar al menos un recurso');
            return $this->redirect(['action' => 'add']);
        }

        $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());

        // asignar usuario logueado (recomendado)
        $reserva->user_id = $session->read('Auth.id');

        //  crear detalle_reservas
        $detallesData = [];

foreach ($carrito as $recursoId) {
    $detallesData[] = [
        'recurso_id' => $recursoId
    ];
}

// 🔥 convertir a entidades
$detalles = $this->Reservas->DetalleReservas->newEntities($detallesData);

$reserva->detalle_reservas = $detalles;

        //  guardar TODO (maestro + detalle)
        if ($this->Reservas->save($reserva, ['associated' => ['DetalleReservas']])) {

            // limpiar carrito
            $session->delete('Carrito');

            $this->Flash->success('Reserva guardada correctamente');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Error al guardar la reserva');
    }

    $users = $this->Reservas->Users->find('list')->all();
    $recursos = $this->Reservas->DetalleReservas->Recursos->find('list')->all();

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
    $reserva = $this->Reservas->get($id, [
        'contain' => ['DetalleReservas']
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {

    $data = $this->request->getData();

    $detalles = [];

    if (!empty($data['detalle_reservas'])) {
        foreach ($data['detalle_reservas'] as $item) {
            if (!empty($item['recurso_id'])) {
                $detalles[] = [
                    'recurso_id' => $item['recurso_id']
                ];
            }
        }
    }

    // Obtener los IDs de los recursos actualmente en la base de datos
    $recursosExistentes = $this->Reservas->DetalleReservas->find('list', [
        'keyField' => 'id',
        'valueField' => 'recurso_id'
    ])->where(['reserva_id' => $id])->toArray();

    // Obtener los IDs de los recursos seleccionados en el formulario
    $recursosSeleccionados = !empty($detalles) ? array_column($detalles, 'recurso_id') : [];

    // Eliminar los recursos que ya no están seleccionados
    if (!empty($recursosSeleccionados)) {
        $this->Reservas->DetalleReservas->deleteAll([
            'reserva_id' => $id,
            'NOT' => ['recurso_id IN' => $recursosSeleccionados]
        ]);
    } else {
        // Si no hay recursos seleccionados, eliminar todos los detalles
        $this->Reservas->DetalleReservas->deleteAll(['reserva_id' => $id]);
    }

    // Insertar los nuevos recursos seleccionados
    $nuevosRecursos = array_filter($detalles, function ($detalle) use ($recursosExistentes) {
        return !in_array($detalle['recurso_id'], $recursosExistentes);
    });

    foreach ($nuevosRecursos as &$detalle) {
        $detalle['reserva_id'] = $id; // Asignar reserva_id
    }

    if (!empty($nuevosRecursos)) {
        $nuevasEntidades = $this->Reservas->DetalleReservas->newEntities($nuevosRecursos);
        $this->Reservas->DetalleReservas->saveMany($nuevasEntidades);
    }

    $reserva = $this->Reservas->patchEntity($reserva, $data, [
        'associated' => ['DetalleReservas']
    ]);

    if ($this->Reservas->save($reserva)) {
        $this->Flash->success('Reserva actualizada correctamente.');
        return $this->redirect(['action' => 'index']);
    } else {
        $this->Flash->error('Error al actualizar la reserva.');
    }
}

    $users = $this->Reservas->Users->find('list')->all();
    $recursos = $this->Reservas->DetalleReservas->Recursos->find('list')->all();

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

    //metodo de agregar al carrito temporal
    public function agregar()
{
    $recursoId = $this->request->getData('recurso_id');

    $session = $this->request->getSession();
    $carrito = $session->read('Carrito') ?? [];

    // evitar duplicados
    if (!in_array($recursoId, $carrito)) {
        $carrito[] = $recursoId;
    }

    $session->write('Carrito', $carrito);

    return $this->redirect(['action' => 'add']);
}

}
