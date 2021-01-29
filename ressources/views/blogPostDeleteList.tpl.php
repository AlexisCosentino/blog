<?php

require 'header.tpl.php';
?>

<h4 class="pb-5"> Supprimer un article</h4>

<form action="index.php?action=blogpostdelete" method="POST" class="form-example">

<h5>Quel article souhaitez-vous supprimer ?</h5>
<?php if (!empty($poststitle)): foreach ($poststitle as $row):  $idvariable=$row['id']?>

    <a> <?=$row['title']?> </a>   <a class="mt-2 mb-2" href="index.php?action=blogpostdelete&id=<?=$idvariable?>">SUPPRIMER</a>
    <br>


<?php endforeach; else : ?>
<p>Il n'y plus aucun article à supprimer</p>
<?php endif; ?>

</form>
<?php

require 'footer.tpl.php';

?>


