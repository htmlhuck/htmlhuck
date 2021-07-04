

<?php $this->layout('layout', ['title' => 'User Profile'])?>

<h1>User Profile</h1>


<?php foreach($postsInView as $post):?>

    <h3><?= $post['title']?></h3>

<?php endforeach;?>

