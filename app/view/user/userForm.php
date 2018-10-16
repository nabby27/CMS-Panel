<h1 class="page-header">
    <?php echo $user->getId() != null ? $user->getId() : 'New user'; ?>
</h1>

<form action="?c=user&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>" />
    
    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user->getUsername(); ?>" class="form-control" placeholder="Username" required>
    </div>

    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user->getName(); ?>" class="form-control" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label>Surname:</label>
        <input type="text" name="surname" value="<?php echo $user->getSurname(); ?>" class="form-control" placeholder="Surname" required>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user->getEmail(); ?>" class="form-control" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label>Telephon:</label>
        <input type="number" name="telephon" value="<?php echo $user->getTelephon(); ?>" class="form-control" placeholder="Telephon" required>
    </div>

    <div class="form-group">
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $user->getAddress(); ?>" class="form-control" placeholder="Address" required>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $user->getPassword(); ?>" class="form-control" placeholder="Password" required
            <?php if ($user->getId() == 1) echo 'disabled'?> >
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password2" value="<?php echo $user->getPassword(); ?>" class="form-control" placeholder="Repeat the password" required
            <?php if ($user->getId() == 1) echo 'disabled'?> >
    </div>

    <div class="form-group">
      <label>Type of user:</label>
      <select name="idType" class="form-control" required <?php if ($user->getId() == 1) echo 'disabled'?>>
        <option value="" disabled selected>Choose...</option>
        <?php foreach($this->typeUserModel->getAll() as $typeUser): ?>
            <option value="<?php echo $typeUser->getId(); ?>" <?php if ($typeUser->getId() == $user->getIdType()) echo 'selected'; ?> >
                <?php echo $typeUser->getTypeUser();?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
