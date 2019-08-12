<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Facturas', 'Notas']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario Creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el Usuario. Inténtelo de nuevo..'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario Guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guardar el Usuario. Inténtelo de nuevo...'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario Eliminado.'));
        } else {
            $this->Flash->error(__('No se ha podido eliminar el Usuario. Inténtelo de nuevo..'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Inicio de sesion
    public function login(){
       // $this->loadModel('usuario');
        //$usuario =$this->Usuarios->newEntity();

      if($this->request->is('post')){
        $user = $this->Auth->identify();
        if($user){
          $this->Auth->setUser($user);
          return $this->redirect(['controller' => 'facturas', 'action' => 'index']);
        }
          $this->Flash->error('No se ha podido Iniciar Sesión');}
     }

     public function logout(){
      $this->Flash->success(__('Sesion Cerrada'));
      return $this->redirect($this->Auth->logout());

     }

     //Para registrarse
     public function register()
     {
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
             $user = $this->Users->patchEntity($user, $this->request->getData());
             if ($this->Users->save($user)) {
                 $this->Flash->success(__('Registrado con Éxito'));

                 return $this->redirect(['action' => 'login']);
             }
             $this->Flash->error(__('No se ha podido registrar. Porfavor inténtelo de nuevo'));
         }
         $this->set(compact('user'));
     }

     //Para que deje registrase aunque no haya iniciado Sesion
     public function beforeFilter(\Cake\Event\Event $event){
       $this->Auth->allow(['Register']);

     }
}
