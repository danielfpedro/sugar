<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo');
$belongsToMany = $this->Bake->aliasExtractor($modelObj, 'BelongsToMany');
$compact = ["'" . $singularName . "'"];
%>

    /**
     * ProfileSettings method
     *
     * @param string|null $id <%= $singularHumanName %> id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function profileSettings()
    {
        $id = $this->Auth->user('id');
        
        $<%= $singularName %> = $this-><%= $currentModelName %>->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $<%= $singularName %> = $this-><%= $currentModelName %>->patchEntity($<%= $singularName %>, $this->request->data);
            if ($this-><%= $currentModelName; %>->save($<%= $singularName %>)) {
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

        $this->set(compact(<%= join(', ', $compact) %>));
        $this->set('_serialize', ['<%=$singularName%>']);
    }
