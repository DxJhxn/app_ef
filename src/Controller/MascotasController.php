<?php
declare(strict_types=1);
namespace App\Controller;

class MascotasController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([]);
    }

    public function index()
{
    $userId = $this->Authentication->getIdentity()->get('id');
    $buscar = $this->request->getQuery('buscar');
    
    $query = $this->Mascotas->find()
        ->where(['Mascotas.user_id' => $userId]);
    
    if (!empty($buscar)) {
        $query->where([
            'OR' => [
                'Mascotas.nombre LIKE' => '%' . $buscar . '%',
                'Mascotas.especie LIKE' => '%' . $buscar . '%',
            ]
        ]);
    }
    
    $mascotas = $this->paginate($query);
    $this->set(compact('mascotas'));
}

    public function view($id = null)
    {
        $userId = $this->Authentication->getIdentity()->get('id');
        $mascota = $this->Mascotas->get($id);
        if ($mascota->user_id !== $userId) {
            throw new \Cake\Http\Exception\ForbiddenException();
        }
        $this->set(compact('mascota'));
    }

    public function add()
    {
        $mascota = $this->Mascotas->newEmptyEntity();
        if ($this->request->is('post')) {
            $mascota = $this->Mascotas->patchEntity($mascota, $this->request->getData());
            $mascota->user_id = $this->Authentication->getIdentity()->get('id');
            if ($this->Mascotas->save($mascota)) {
                $this->Flash->success(__('Mascota guardada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar. Intente nuevamente.'));
        }
        $this->set(compact('mascota'));
    }

    public function edit($id = null)
    {
        $userId = $this->Authentication->getIdentity()->get('id');
        $mascota = $this->Mascotas->get($id);
        if ($mascota->user_id !== $userId) {
            throw new \Cake\Http\Exception\ForbiddenException();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mascota = $this->Mascotas->patchEntity($mascota, $this->request->getData());
            if ($this->Mascotas->save($mascota)) {
                $this->Flash->success(__('Mascota actualizada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar. Intente nuevamente.'));
        }
        $this->set(compact('mascota'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userId = $this->Authentication->getIdentity()->get('id');
        $mascota = $this->Mascotas->get($id);
        if ($mascota->user_id !== $userId) {
            throw new \Cake\Http\Exception\ForbiddenException();
        }
        if ($this->Mascotas->delete($mascota)) {
            $this->Flash->success(__('Mascota eliminada correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
