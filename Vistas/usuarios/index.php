<ul class="usuarios">
    <?php foreach ($this->usuarios as $user) { ?>
        <li><?php echo $user['nombres'].' '.$user['apellidos'] ?></li>
    <?php } ?>
</ul>