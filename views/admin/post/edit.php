<?php

use App\Connection;
use App\Table\PostTable;
use App\Validator ;
use App\HTML\Forms;

$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);
$success = false;

$errors = [];

if(!empty($_POST)) {
    Validator::lang('fr');
    $v = new Validator($_POST);
    $v->rule('required', ['name', 'slug']);
    $v->rule('lengthBetween',['name', 'slug'],  3, 200);
    $post
        ->setName($_POST['name'])
        ->setContent($_POST['content'])
        ->setSlug($_POST['slug'])
        ->setCreatedAt($_POST['name']);
    if ($v->validate()) {
        $postTable->update($post);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new Forms($post, $errors);

?>

<?php if($success): ?>
<div class="alert alert-success">
    L'article a bien été modifié
</div>
<?php endif ?>

<?php if (empty($errors)): ?>
<div class="alert alert-danger">
    l'article n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>


<h1> Editer l'article <?= e($post->getName()) ?> </h1>

<form action="" method="POST">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>

    <buttom class="btn btn-primary">Modifier</buttom>
</form>

