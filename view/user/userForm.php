<h1 class="page-header">
    <?php echo $user->id != null ? $user->name : 'New user'; ?>
</h1>

<form id="frm-user" action="?c=user&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
      
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label>Surname:</label>
        <input type="text" name="surname" value="<?php echo $user->surname; ?>" class="form-control" placeholder="Surname" required>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label>Telephon:</label>
        <input type="number" name="telephon" value="<?php echo $user->telephon; ?>" class="form-control" placeholder="Telephon" required>
    </div>

    <div class="form-group">
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control" placeholder="Address" required>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="number" name="password" value="<?php echo $user->password; ?>" class="form-control" placeholder="Password" required>
    </div>

    <div class="form-group">
      <label for="inputArticle">Type of user:</label>
      <select id="inputArticle" name="idArticle" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->typeUserModel->getAll() as $r): ?>
            <option value="<?php echo $r->id; ?>" <?php if ($r->id == $user->idType) echo 'selected'; ?> >
                <?php echo $r->typeUser; ?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-user").submit(function(){
            return $(this).validate();
        });
    })
</script>
