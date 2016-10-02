<div class="sugar-container-login">
	<div class="sugar-login-overlay"></div>

	<div class="panel panel-login">
		<div class="panel-body">
			<h3>Recupere a sua senha</h3>
			<?= $this->Flash->render() ?>
		    <?= $this->Form->create() ?>
		        <?= $this->Form->input('email') ?>
		        <button type="submit" class="btn btn-primary btn-block">
		        	Recuperar senha
		        </button>
		    <?= $this->Form->end() ?>
	    </div>
    </div>
</div>
