<h1 class="page-header">
    <?php echo $user->getName() .' '. $user->getSurname(); ?>
</h1>
<form id="form" class="border border-info rounded p-4" action="<?php echo Settings::PATH['base'] ?>/auth/validate" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idAuth" value="<?php echo $auth->getAuthId(); ?>" />
    <input type="hidden" name="idUser" value="<?php echo $user->getId(); ?>" />
    
    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Account data</legend>
        
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $auth->getUsername(); ?>" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label>Current password:</label>
            <input type="password" name="currentPassword" class="form-control <?php if ($error['INVALID_PASSWORD'] == Settings::ERRORS['INVALID_PASSWORD']) echo 'is-invalid'?>" placeholder="Current password" required>
            <?php if ($error['INVALID_PASSWORD'] == Settings::ERRORS['INVALID_PASSWORD']) { ?>
                <div class="invalid-feedback">
                    invalid password.
                </div>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>New password:</label>
            <input type="password" name="newPassword" class="form-control <?php if ($error['PASSWORDS_NOT_MATCH'] == Settings::ERRORS['PASSWORDS_NOT_MATCH']) echo 'is-invalid'?>" placeholder="New password" required>
            <?php if ($error['PASSWORDS_NOT_MATCH'] == Settings::ERRORS['PASSWORDS_NOT_MATCH']) { ?>
                <div class="invalid-feedback">
                    Password not match.
                </div>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Repeat the password:</label>
            <input type="password" name="repeatPassword" class="form-control <?php if ($error['PASSWORDS_NOT_MATCH'] == Settings::ERRORS['PASSWORDS_NOT_MATCH']) echo 'is-invalid'?>" placeholder="Repeat password" required>
            <?php if ($error['PASSWORDS_NOT_MATCH'] == Settings::ERRORS['PASSWORDS_NOT_MATCH']) { ?>
                <div class="invalid-feedback">
                    Password not match.
                </div>
            <?php } ?>
        </div>
    </fieldset>

    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
