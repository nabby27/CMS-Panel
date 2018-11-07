<a class="btn btn-primary text-center" href="<?php echo Settings::PATH['base'] ?>/user/create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
            <th class="text-center"><i class="far fa-edit"></i></th>
            <th class="text-center"><i class="fas fa-unlock-alt"></i></th>
            <th class="text-center">ID</th><th class="text-center">NAME</th><th class="text-center">SURNAME</th>
            <th class="text-center">EMAIL</th><th class="text-center">TELEPHONE</th><th class="text-center">ADDRESS</th>
            <th class="text-center">TYPE USER</th>
        </thead>
        <?php if ($users != null) { ?>
            <?php foreach($users as $user): ?>
                <tr>
                    <td class="text-center">
                        <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this user?');" href="<?php echo Settings::PATH['base'] ?>/user/delete/<?php echo $user->getId(); ?>">Delete</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="<?php echo Settings::PATH['base'] ?>/user/edit/<?php echo $user->getId(); ?>">Edit</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Settings::PATH['base'] ?>/auth/edit/<?php echo $user->getId(); ?>">Password</a>
                    </td>

                    <td class="text-center"><?php echo $user->getId(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $user->getName(); ?>"><?php echo ucfirst($user->getName()); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $user->getSurname(); ?>"><?php echo ucfirst($user->getSurname()); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $user->getEmail(); ?>"><?php echo $user->getEmail(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $user->getTelephon(); ?>"><?php echo $user->getTelephon(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $user->getAddress(); ?>"><?php echo $user->getAddress(); ?></td>
                    <?php foreach($typeUsers as $typeUser): ?>
                        <?php if ($typeUser->getId() == $user->getIdType()) echo "<td class='text-center' data-toggle='tooltip' data-placement='top' title='".ucfirst($typeUser->getTypeUser())."'>".ucfirst($typeUser->getTypeUser())."</td>"; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="10" class="text-center text-info bg-light"> THERE ARE NO RECORDS </td>
            </tr>
        <?php } ?>
    </table>
</div>