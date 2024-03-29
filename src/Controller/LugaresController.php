<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lugares Controller
 *
 * @property \App\Model\Table\LugaresTable $Lugares
 *
 * @method \App\Model\Entity\Lugare[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LugaresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $lugares = $this->paginate($this->Lugares);

        $this->set(compact('lugares'));
    }

    /**
     * View method
     *
     * @param string|null $id Lugare id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lugare = $this->Lugares->get($id, [
            'contain' => []
        ]);

        $this->set('lugare', $lugare);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lugare = $this->Lugares->newEntity();
        if ($this->request->is('post')) {
            $lugare = $this->Lugares->patchEntity($lugare, $this->request->getData());
            if ($this->Lugares->save($lugare)) {
                $this->Flash->success(__('Lugar Guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guardar el lugar. Inténtelo de nuevo.'));
        }
        $this->set(compact('lugare'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lugare id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lugare = $this->Lugares->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lugare = $this->Lugares->patchEntity($lugare, $this->request->getData());
            if ($this->Lugares->save($lugare)) {
                $this->Flash->success(__('Lugar Guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guardar el lugar. Inténtelo de nuevo..'));
        }
        $this->set(compact('lugare'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lugare id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lugare = $this->Lugares->get($id);
        if ($this->Lugares->delete($lugare)) {
            $this->Flash->success(__('Lugar GUardado.'));
        } else {
            $this->Flash->error(__('No se ha podido eliminar el lugar. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
