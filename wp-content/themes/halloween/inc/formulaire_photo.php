<form method="POST" action="<?php echo admin_url('admin-post.php'); ?>">
    <button class="button button-primary">Envoyer</button>
    <input type="hidden" name="action" value="photos_form"> <!-- Pour utiliser admin_post_hook -->
</form>