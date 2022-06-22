        <div class="headers"><div class="boxs flexs">
        <div class="contentInfo">
        <h1>
              <?php if ($user['id']): ?>
                  Atualizar <b><?php echo $user['nome'] ?></b>
              <?php else: ?>
                  Cadastrar novo lead
              <?php endif ?>
          </h1>
        </div>
        </div>
        </div>
        </section>
<section class="section0">
        <div class="box flex">
            
        <div class="contentInfo">
        
        </div>
        <div class="box flex">

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="nome" value="<?php echo $user['nome'] ?>"
                           class="form-control <?php echo $errors['nome'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['nome'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Cpf</label>
                    <input name="cpf" value="<?php echo $user['cpf'] ?>"
                           class="form-control <?php echo $errors['cpf'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['cpf'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" value="<?php echo $user['email'] ?>"
                           class="form-control  <?php echo $errors['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input name="telefone" value="<?php echo $user['telefone'] ?>"
                           class="form-control  <?php echo $errors['telefone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['telefone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Idade</label>
                    <input name="idade" value="<?php echo $user['idade'] ?>"
                           class="form-control  <?php echo $errors['idade'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['idade'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Site</label>
                    <input name="site" value="<?php echo $user['site'] ?>"
                           class="form-control  <?php echo $errors['site'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['site'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>

 </div>
         </div>
         </section>