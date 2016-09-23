<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SpecialPlayers Controller
 *
 * @property \App\Model\Table\SpecialPlayersTable $SpecialPlayers
 */
class SpecialPlayersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $q = '%' . str_replace(' ', '%', $this->request->query('q')) . '%';
        
        $this->paginate['conditions'] = [
            'SpecialPlayers.id LIKE ' => $q
        ];

        $specialPlayers = $this->paginate($this->SpecialPlayers);

        $this->set(compact('specialPlayers'));
        $this->set('_serialize', ['specialPlayers']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialPlayer = $this->SpecialPlayers->newEntity();
        if ($this->request->is('post')) {
            $specialPlayer = $this->SpecialPlayers->patchEntity($specialPlayer, $this->request->data);
            if ($this->SpecialPlayers->save($specialPlayer)) {
                $this->Flash->success(__('O special player foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O special player não foi salvo. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('specialPlayer'));
        $this->set('_serialize', ['specialPlayer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Special Player id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialPlayer = $this->SpecialPlayers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialPlayer = $this->SpecialPlayers->patchEntity($specialPlayer, $this->request->data);
            if ($this->SpecialPlayers->save($specialPlayer)) {
                $this->Flash->success(__('O special player foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O special player não foi salvo. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('specialPlayer'));
        $this->set('_serialize', ['specialPlayer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Special Player id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialPlayer = $this->SpecialPlayers->get($id);
        if ($this->SpecialPlayers->delete($specialPlayer)) {
            $this->Flash->success(__('O special player foi deletado.'));
        } else {
            $this->Flash->error(__('O special player não foi salvo. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
