<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Utility\Security;
use Cake\Event\Event;
use Cake\I18n\Time;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['forgotPassword', 'resetPassword']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        
        $q = '%' . str_replace(' ', '%', $this->request->query('q')) . '%';
        
        $this->paginate['conditions'] = [
            'Users.name LIKE ' => $q
        ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O user foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O user não foi salvo. Por favor, tente novamente.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O user foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O user não foi salvo. Por favor, tente novamente.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O user foi deletado.'));
        } else {
            $this->Flash->error(__('O user não foi salvo. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        $this->viewBuilder()->layout('login');
        
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('A combinação Email/Senha informada é inválida.'), ['key' => 'auth']);
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Network\Response
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * ProfileSettings method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function accountSettings()
    {
        $id = $this->Auth->user('id');
        
        $user = $this->Users->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data, [
                'validate' => 'CheckCurrentPassword',
            ]);
            if ($this->Users->save($user)) {
                
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));

                return $this->redirect(['action' => 'accountSettings']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Por favor, tente novamente.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * ProfileSettings method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function profileSettings()
    {
        $id = $this->Auth->user('id');
        
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                /**
                 * Atualizo os dados da sessão que eu uso para mostrar algo como nome e imagem de perfil
                 */
                $this->Auth->session->write($this->Auth->sessionKey . '.name', $user->name);
                
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));

                return $this->redirect(['action' => 'profileSettings']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Por favor, tente novamente.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * ProfileSettings method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function passwordSettings()
    {
        $id = $this->Auth->user('id');
        
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data, [
                'validate' => 'CheckCurrentPassword',
            ]);

            if ($this->Users->save($user)) {
                
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));

                return $this->redirect(['action' => 'passwordSettings']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Por favor, tente novamente.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * ProfileSettings method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function profileImageSettings()
    {
        $id = $this->Auth->user('id');
        
        $user = $this->Users->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                /**
                 * Pego o user de novo para pegar os dados novos da imagem
                 */
                $user = $this->Users->get($user->id);
                $this->Auth->session->write($this->Auth->sessionKey . '.profile_picture_path', $user->profile_picture_path);
                
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));

                return $this->redirect(['action' => 'profileImageSettings']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Por favor, tente novamente.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public function forgotPassword()
    {
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            if (!$this->request->data('email')) {
                $this->Flash->error('Você não informou nenhum email.');
                return $this->redirect(['action' => 'forgotPassword']);
            }
            $user = $this->Users->find('all', [
                'conditions' => [
                    'Users.username' => $this->request->data('email')
                ]
            ])
            ->first();

            if (!$user) {
                $this->Flash->error('Desculpe, o email <strong>'.$this->request->data('email').'</strong> informado não é de nenhum usuário válido.', ['escape' => false]);
                return $this->redirect(['action' => 'forgotPassword']);
            }

            $tokenData = [
                'email' => $user->username,
                'stamp' => Time::now()
            ];
            $user->forgot_password_token = JWT::encode($tokenData, Security::salt());
            $expDate = Time::now();
            $user->forgot_password_exp_date = $expDate->modify('+1 day');

            if (!$this->Users->save($user)) {
                $this->Flash->error('Ocorreu um erro ao tentar executar a sua requisição. Por favor, tente novamente.');
            }
            $this->Flash->success('As informações para recuperar a sua senha foram enviadas para o email '.$this->request->data('email').'.');
            return $this->redirect(['action' => 'forgotPassword']);
        }
    }
    public function resetPassword($token = null)
    {
        $this->viewBuilder()->layout('login');

        $user = $this->Users->newEntity();
        /**
         * Quando da algum erro(token inexistente, inválido, expirado etc...) eu redireciono com a flag invalid, então não faço nada se houver a flag.
         */
        if (!$this->request->query('invalid') && !$this->request->query('exp')) {
            try {
                $data = JWT::decode($token, Security::salt(), ['HS256']);   
                debug($data);
            } catch (\Exception $e) {
                return $this->redirect(['action' => 'resetPassword', '?' => ['invalid' => true], $token]);
            }
            if (!isset($data->email)) {
                return $this->redirect(['action' => 'resetPassword', '?' => ['invalid' => true], $token]);
            }
            $user = $this->Users->find('all', [
                'conditions' => [
                    'Users.username' => $data->email
                ]
            ])
            ->first();
            /**
             * Verifico se o token é o mesmo
             */
            if ($user->forgot_password_token != $token) {
                return $this->redirect(['action' => 'resetPassword', '?' => ['invalid' => true], $token]);
            }
            /**
             * Verifico se já expirou
             */
            if ($user->forgot_password_exp_date <= Time::now()) {
                return $this->redirect(['action' => 'resetPassword', '?' => ['exp' => true], $token]);
            }

            if ($this->request->is(['patch', 'post', 'put'])) {

                $user = $this->Users->patchEntity($user, [
                    'new_password' => $this->request->data('new_password'),
                    'confirm_new_password' => $this->request->data('confirm_new_password'),
                    'password' => $this->request->data('new_password'),
                    'forgot_password_token' => null,
                    'forgot_password_exp_date' => null,
                ]);

                if (!$this->Users->save($user)) {
                    $this->Flash->error('Ocorreu um erro ao tentar salvar a sua senha. Por favor tente novamente.');
                } else {
                    $this->Flash->success('A sua senha foi redefinia e agora você já pode logar com ela.');
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
            }
        } else {
            if ($this->request->query('exp')) {
                $this->Flash->error('Para a sua segurança quando você requisita a redefinição de senha você tem 24 horas para concluir o processo e este prazo expirou, favor requisitar novamente.');
            }
            $this->Flash->error('URL inválida.');
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
