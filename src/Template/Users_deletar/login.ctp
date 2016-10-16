<div class="sugar-container-login">
	<div class="sugar-login-overlay"></div>

	<div class="panel panel-login">
		<div class="panel-body">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Flash->render() ?>
		    <?= $this->Form->create() ?>
		        <?= $this->Form->input('username') ?>
		        <?= $this->Form->input('password') ?>
		        <?= $this->Html->link('Esqueceu a senha?', ['controller' => 'Users', 'action' => 'forgotPassword']) ?>
		        <button type="submit" class="btn btn-primary btn-block">
		        	Entrar
		        </button>
		    <?= $this->Form->end() ?>
	    </div>
    </div>
</div>
