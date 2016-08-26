<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <form class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="q">Palavra Chave</label>
                                    <input type="text" class="form-control" id="q">                        
                                </div>
                                <div class="col-md-4">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control">
                                        <option>Todos</option>
                                    </select>                  
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-primary" style="margin-top: 25px;">
                                        <span class="fa fa-search"></span>
                                        Pesquisar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-danger btn-sm">
                                    <span class="fa fa-plus"></span>
                                    Adicionar Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
<!--                     <div class="header">
                        <h4 class="title">Adicionar Post</h4>
                        <p class="category">
                            <a href="#">Posts</a> / 
                            Adicionar Post
                        </p>
                    </div> -->
<!--                     <div class="content">
                        <div class="">
                                                        <button class="btn btn-danger">
                                    <span class="fa fa-plus"></span>
                                    Adicionar Post
                                </button>
                                </div>
                    </div>           -->          
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                                <th>City</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php for($i = 0; $i < 10; $i++): ?>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                        <td class="text-right">
                                            <a href="#">
                                                <span class="fa fa-pencil"></span> Editar
                                            </a>
                                            <a href="#" class="text-danger">
                                                <span class="fa fa-remove"></span> Remover
                                            </a>                                            
                                        </td>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>