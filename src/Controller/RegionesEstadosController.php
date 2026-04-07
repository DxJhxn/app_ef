<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RegionesEstados Controller
 *
 * @property \App\Model\Table\RegionesEstadosTable $RegionesEstados
 */
class RegionesEstadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->RegionesEstados->find();
        $regionesEstados = $this->paginate($query);

        $this->set(compact('regionesEstados'));
    }

    /**
     * View method
     *
     * @param string|null $id Regiones Estado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regionesEstado = $this->RegionesEstados->get($id, contain: []);
        $this->set(compact('regionesEstado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regionesEstado = $this->RegionesEstados->newEmptyEntity();
        if ($this->request->is('post')) {
            $regionesEstado = $this->RegionesEstados->patchEntity($regionesEstado, $this->request->getData());
            if ($this->RegionesEstados->save($regionesEstado)) {
                $this->Flash->success(__('The regiones estado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regiones estado could not be saved. Please, try again.'));
        }
        $this->set(compact('regionesEstado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Regiones Estado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regionesEstado = $this->RegionesEstados->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regionesEstado = $this->RegionesEstados->patchEntity($regionesEstado, $this->request->getData());
            if ($this->RegionesEstados->save($regionesEstado)) {
                $this->Flash->success(__('The regiones estado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regiones estado could not be saved. Please, try again.'));
        }
        $this->set(compact('regionesEstado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Regiones Estado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regionesEstado = $this->RegionesEstados->get($id);
        if ($this->RegionesEstados->delete($regionesEstado)) {
            $this->Flash->success(__('The regiones estado has been deleted.'));
        } else {
            $this->Flash->error(__('The regiones estado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
