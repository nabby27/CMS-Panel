<h1 class="page-header">
    <?php echo $user->getName() .' '. $user->getSurname(); ?>
</h1>

<form class="border border-primary rounded p-4" action="<?php echo Settings::PATH['base'] ?>/user/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $auth->getAuthId(); ?>" />
    
    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Account data</legend>
        
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $auth->getUsername(); ?>" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label>Current password:</label>
            <input type="password" name="currentPassword" class="form-control" placeholder="Current password" required>
        </div>

        <div class="form-group">
            <label>New password:</label>
            <input type="password" name="newPassword" class="form-control" placeholder="New password" required>
        </div>

        <div class="form-group">
            <label>Repeat the password:</label>
            <input type="password" name="repeatPassword" class="form-control" placeholder="Repeat password" required>
        </div>

        <div class="col-md-3 mb-3">
            <label for="validationServer05">Zip</label>
            <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>

    </fieldset>

    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
