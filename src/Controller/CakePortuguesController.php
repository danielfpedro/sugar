<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CakePortugues Controller
 *
 * @property \App\Model\Table\CakePortuguesTable $CakePortugues
 */
class CakePortuguesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cakePortugues = $this->paginate($this->CakePortugues);

        $this->set(compact('cakePortugues'));
        $this->set('_serialize', ['cakePortugues']);
    }

    /**
     * View method
     *
     * @param string|null $id Cake Portugue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cakePortugue = $this->CakePortugues->get($id, [
            'contain' => []
        ]);

        $this->set('cakePortugue', $cakePortugue);
        $this->set('_serialize', ['cakePortugue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cakePortugue = $this->CakePortugues->newEntity();
        if ($this->request->is('post')) {
            $cakePortugue = $this->CakePortugues->patchEntity($cakePortugue, $this->request->data);
            if ($this->CakePortugues->save($cakePortugue)) {
                $this->Flash->success(__('The cake portugue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cake portugue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cakePortugue'));
        $this->set('_serialize', ['cakePortugue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cake Portugue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cakePortugue = $this->CakePortugues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cakePortugue = $this->CakePortugues->patchEntity($cakePortugue, $this->request->data);
            if ($this->CakePortugues->save($cakePortugue)) {
                $this->Flash->success(__('The cake portugue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cake portugue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cakePortugue'));
        $this->set('_serialize', ['cakePortugue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cake Portugue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cakePortugue = $this->CakePortugues->get($id);
        if ($this->CakePortugues->delete($cakePortugue)) {
            $this->Flash->success(__('The cake portugue has been deleted.'));
        } else {
            $this->Flash->error(__('The cake portugue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
