<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Etiquetas Controller
 *
 * @property \App\Model\Table\EtiquetasTable $Etiquetas
 *
 * @method \App\Model\Entity\Etiqueta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EtiquetasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $etiquetas = $this->paginate($this->Etiquetas);

        $this->set(compact('etiquetas'));
    }

    /**
     * View method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Facturas']
        ]);

        $this->set('etiqueta', $etiqueta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etiqueta = $this->Etiquetas->newEntity();
        if ($this->request->is('post')) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('Etiqueta Guardada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Etiqueta no se ha guardado, inténtelo de nuevo..'));
        }
        $facturas = $this->Etiquetas->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'facturas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Facturas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('Etiqueta Guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Etiqueta no se ha guardado, inténtelo de nuevo..'));
        }
        $facturas = $this->Etiquetas->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'facturas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etiqueta = $this->Etiquetas->get($id);
        if ($this->Etiquetas->delete($etiqueta)) {
            $this->Flash->success(__('Etiqueta Eliminada.'));
        } else {
            $this->Flash->error(__('La Etiqueta no se ha eliminado, inténtelo de nuevo..'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
