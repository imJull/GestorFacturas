<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notas Controller
 *
 * @property \App\Model\Table\NotasTable $Notas
 *
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Facturas', 'Users']
        ];
        $notas = $this->paginate($this->Notas);

        $this->set(compact('notas'));
    }

    /**
     * View method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nota = $this->Notas->get($id, [
            'contain' => ['Facturas', 'Users']
        ]);

        $this->set('nota', $nota);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nota = $this->Notas->newEntity();
        if ($this->request->is('post')) {
            $nota = $this->Notas->patchEntity($nota, $this->request->getData());
            if ($this->Notas->save($nota)) {
                $this->Flash->success(__('Nota Creada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear la nota. Inténtelo de nuevo.'));
        }
        $facturas = $this->Notas->Facturas->find('list', ['limit' => 200]);
        $users = $this->Notas->Users->find('list', ['limit' => 200]);
        $this->set(compact('nota', 'facturas', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nota = $this->Notas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nota = $this->Notas->patchEntity($nota, $this->request->getData());
            if ($this->Notas->save($nota)) {
                $this->Flash->success(__('Nota Guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guardar la nota. Inténtelo de nuevo.'));
        }
        $facturas = $this->Notas->Facturas->find('list', ['limit' => 200]);
        $users = $this->Notas->Users->find('list', ['limit' => 200]);
        $this->set(compact('nota', 'facturas', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nota = $this->Notas->get($id);
        if ($this->Notas->delete($nota)) {
            $this->Flash->success(__('Nota Eliminada.'));
        } else {
            $this->Flash->error(__('No se ha podido eliminar la nota. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
