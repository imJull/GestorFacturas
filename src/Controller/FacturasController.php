<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Facturas Controller
 *
 * @property \App\Model\Table\FacturasTable $Facturas
 *
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Clientes', 'Lugares']
        ];
        $facturas = $this->paginate($this->Facturas);

        $this->set(compact('facturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => ['Users', 'Clientes', 'Lugares', 'Etiquetas', 'Notas']
        ]);

        $this->set('factura', $factura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factura = $this->Facturas->newEntity();
        if ($this->request->is('post')) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        $users = $this->Facturas->Users->find('list', ['limit' => 200]);
        $clientes = $this->Facturas->Clientes->find('list', ['limit' => 200]);
        $lugares = $this->Facturas->Lugares->find('list', ['limit' => 200]);
        $etiquetas = $this->Facturas->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('factura', 'users', 'clientes', 'lugares', 'etiquetas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => ['Etiquetas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        $users = $this->Facturas->Users->find('list', ['limit' => 200]);
        $clientes = $this->Facturas->Clientes->find('list', ['limit' => 200]);
        $lugares = $this->Facturas->Lugares->find('list', ['limit' => 200]);
        $etiquetas = $this->Facturas->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('factura', 'users', 'clientes', 'lugares', 'etiquetas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factura = $this->Facturas->get($id);
        if ($this->Facturas->delete($factura)) {
            $this->Flash->success(__('The factura has been deleted.'));
        } else {
            $this->Flash->error(__('The factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //funcion para las etiquetas -> Luego ir a tabla de facturas y crear una funcion para encontrar etiquetas
    public function etiquetas(){
      //Para la paginacion, tambien está arribita en index
      $this->paginate = [
          'contain' => ['Users', 'Clientes', 'Lugares']
      ];
      $this->set('facturas', $this->paginate($this->Facturas));

      $etiquetas = $this->request->params['pass'];

      //buscar etiquetas en la tabla de facturas
      $facturas = $this->Facturas->find('etiquetado', [ 'etiquetas' => $etiquetas]);

      //para que la cuestion se vertical
      $this->set(['facturas' => $facturas, 'etiquetas' => $etiquetas]);
    }

    // Busqueda
    public function buscar(){
        $etiqueta = $this->request->data('busquedaetiqueta');
        return $this->redirect('/facturas/etiquetado/'.$etiqueta);
    }
}
