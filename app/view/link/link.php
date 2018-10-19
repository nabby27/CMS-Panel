<a class="btn btn-primary text-center" href="<?php echo Settings::PATH['base'] ?>/link/create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
            <th class="text-center"><i class="far fa-edit"></i></th>
            <th class="text-center">ID</th><th class="text-center">NAME</th><th class="text-center">LINK</th>
                <th class="text-center">ARTICLE</th>
        </thead>
        <?php if ($links != null) { ?>
            <?php foreach($links as $link): ?>
                <tr>
                    <td class="text-center">
                        <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this link?');" href="<?php echo Settings::PATH['base'] ?>/link/delete/<?php echo $link->getId(); ?>">Delete</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="<?php echo Settings::PATH['base'] ?>/link/edit/<?php echo $link->getId(); ?>">Edit</a>
                    </td>
                    <td class="text-center"><?php echo $link->getId(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $link->getName(); ?>"><?php echo $link->getName(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $link->getLink(); ?>"><?php echo $link->getLink(); ?></td>
                    <?php foreach($this->articleModel->getAll() as $article): ?>
                        <?php if ($article->getId() == $link->getIdArticle()) echo "<td class='text-center' data-toggle='tooltip' data-placement='top' title='".$article->getName()."'>".$article->getName()."</td>"; ?>
                    <?php endforeach; ?>

                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center text-info bg-light"> THERE ARE NO RECORDS </td>
            </tr>
        <?php } ?>
    </table>
</div>