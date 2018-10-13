<a class="btn btn-primary text-center" href="?c=user&a=create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<table class="table table-hover">
    <thead class="thead-light">
        <th class="text-center">ID</th><th class="text-center">USERNAME</th><th class="text-center">NAME</th>
            <th class="text-center">SURNAME</th><th class="text-center">EMAIL</th><th class="text-center">TELEPHONE</th>
            <th class="text-center">ADDRESS</th><th class="text-center">PASSWORD</th><th class="text-center">TYPE USER</th>
        <th class="text-center"><i class="far fa-edit"></i></th>
        <th class="text-center"><i class="fas fa-trash-alt"></i></th>
    </thead>
    <?php foreach($this->getAll() as $user): ?>
        <tr>
            <td class="text-center"><?php echo $user->getId(); ?></td>
            <td class="text-center"><?php echo $user->getUsername(); ?></td>
            <td class="text-center"><?php echo $user->getName(); ?></td>
            <td class="text-center"><?php echo $user->getSurname(); ?></td>
            <td class="text-center"><?php echo $user->getEmail(); ?></td>
            <td class="text-center"><?php echo $user->getTelephon(); ?></td>
            <td class="text-center"><?php echo $user->getAddress(); ?></td>
            <td class="text-center"><?php echo $user->getPassword(); ?></td>
            <?php foreach($this->typeUserModel->getAll() as $typeUser): ?>
                <?php if ($typeUser->getId() == $user->getIdType()) echo "<td>".$typeUser->getTypeUser()."</td>"; ?>
            <?php endforeach; ?>

            <td class="text-center">
                <a class="btn btn-warning" href="?c=user&a=edit&id=<?php echo $user->getId(); ?>">Edit</a>
            </td>
            <td class="text-center">
                <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this user?');" href="?c=user&a=delete&id=<?php echo $user->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>