<div class="sugar-container-login">
	<div class="sugar-login-overlay"></div>

	<div class="panel panel-login">
		<div class="panel-body">
			<h3>Redefinir a sua senha</h3>
			<?= $this->Flash->render() ?>
			<?php if (!$this->request->query('invalid')): ?>
			    <?= $this->Form->create($user) ?>
			        <?= $this->Form->input('new_password') ?>
			        <?= $this->Form->input('confirm_new_password') ?>
			        <button type="submit" class="btn btn-primary btn-block">
			        	Redefinir Senha
			        </button>
			    <?= $this->Form->end() ?>
		    <?php endif ?>
	    </div>
    </div>
</div>
