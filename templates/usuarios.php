<?php require_once './templates/header.phtml'; ?>

<main>
    <?php
    foreach($users as $user){
        ?>
        <div class="user-card">
            <div>
                <!-- fullname,user, email, password, tipousuario -->
                <h3><?php echo $user->fullname ?></h3>
                <p>$<?php echo $user->user ?></p>
                <p><?php echo $user->email ?></p>
                <p><?php echo $user->tipousuario ?></p>
            </div>
            <h3 class="user-card-name"></h3>
            <button type="submit">EDITAR</button>
            <button class="delButton"><a href="delProduct/<?php echo $product->id_product?>">BORRAR</a></button>
        </div>
        
    <?php
    }
    ?>
</main>

<?php require_once 'templates/footer.phtml';?>