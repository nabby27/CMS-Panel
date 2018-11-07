<div>
    <a class="btn btn-primary text-center" href="<?php echo Settings::PATH['base'] ?>/picture/create">
        <i class="fas fa-plus"></i> Create
    </a>
    <?php if (isset($_REQUEST['idArticle'])) { ?>
        <h2 class="d-flex justify-content-center text-info">
            PICTURES FROM ARTICLE: <b><?php echo '&nbsp'.strtoupper($this->articleModel->getOne($_REQUEST['idArticle'])->getName()); ?></b>
        </h2>
    <?php } ?>
</div>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
            <th class="text-center"><i class="far fa-edit"></i></th>
            <th class="text-center">ID</th><th class="text-center">PICTURE</th><th class="text-center">DESCRIPTION</th>
                <th class="text-center">ARTICLE</th>
        </thead>
        <?php if ($pictures != null) { ?>
            <?php foreach($pictures as $picture): ?>
                <tr>
                    <td class="text-center">
                        <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this picture?');" href="<?php echo Settings::PATH['base'] ?>/picture/delete/<?php echo $picture->getId(); ?>">Delete</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="<?php echo Settings::PATH['base'] ?>/picture/edit/<?php echo $picture->getId(); ?>">Edit</a>
                    </td>
                    <td class="text-center"><?php echo $picture->getId(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $picture->getPicture(); ?>"><?php echo $picture->getPicture(); ?></td>
                    <td class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $picture->getDescription(); ?>"><?php echo $picture->getDescription(); ?></td>
                    <?php foreach($this->articleModel->getAll() as $article): ?>
                        <?php if ($article->getId() == $picture->getIdArticle()) echo "<td class='text-center' data-toggle='tooltip' data-placement='top' title='".ucfirst($article->getName())."'>".ucfirst($article->getName())."</td>"; ?>
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