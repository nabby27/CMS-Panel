<h1 class="page-header">
    <?php echo $user->getId() != null ? $user->getId() : 'New user'; ?>
</h1>

<form class="border border-primary rounded p-4" action="<?php echo Settings::PATH['base'] ?>/user/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>" />
    
    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Account data</legend>
        
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="name" value="<?php echo $user->getName(); ?>" class="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label>Current password:</label>
            <input type="text" name="surname" value="<?php echo $user->getSurname(); ?>" class="form-control" placeholder="Surname" required>
        </div>

        <div class="form-group">
            <label>New password:</label>
            <input type="email" name="email" value="<?php echo $user->getEmail(); ?>" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Repeat the password:</label>
            <input type="number" name="telephon" value="<?php echo $user->getTelephon(); ?>" class="form-control" placeholder="Telephon" required>
        </div>

    </fieldset>

    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Account data</legend>
        <?php if ($user->getId() == null) { ?>
            
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $user->getUsername(); ?>" class="form-control" placeholder="Username" required>
            </div>


            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $user->getPassword(); ?>" class="form-control" placeholder="Password" required
                    <?php if ($user->getId() == 1) echo 'disabled'?> >
            </div>
        <?php } ?>
        
        <div class="form-group">
            <label>Type of user:</label>
            <select name="idType" class="form-control custom-select" required <?php if ($user->getId() == 1) echo 'disabled'?>>
                <option value="" disabled selected>Choose...</option>
                <?php foreach($this->typeUserModel->getAll() as $typeUser): ?>
                    <option value="<?php echo $typeUser->getId(); ?>" <?php if ($typeUser->getId() == $user->getIdType()) echo 'selected'; ?> >
                        <?php echo $typeUser->getTypeUser();?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>

    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
