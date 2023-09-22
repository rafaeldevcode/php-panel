<div class='flex flex-nowrap items-center shadow lg p-2 profile shadow-xl'>
    <div class='user'>
        <a href='<?php route('/admin/profile') ?>' title='Editar perfil de Rafael'>
            <img class='border border-color-main w-full' src='<?php asset("assets/images/users/{$_SESSION['user_avatar']}") ?>' alt='<?php echo $_SESSION['user_name'] ?>' />
        </a>
    </div>
    
    <div class='hiddeItem dNone profile-dropdawn ml-2'  data-item-active='false'>
        <a href='<?php route('/admin/profile') ?>' title='Ver e editar perfil' class='profile-dropdawn-btn w-full text-light font-bold' aria-expanded='false'>
            <?php echo explode(' ', $_SESSION['user_name'])[0] ?>
        </a>

        <!-- <ul class='dropdown-menu dropdown-menu-dark'>
            <li>
                <a title="Editar perfil" href='<?php route('/admin/profile') ?>' class='dropdown-item flex flex-row justify-between'>
                    Perfil
                    <i class='bi bi-person-bounding-box'></i>
                </a>
            </li>
            <li>
                <form action="<?php route('/login/logout.php') ?>" method="POST">
                    <button type="submit" title="Fazer logout" class='dropdown-item flex flex-row justify-between'>
                        Logout
                        <i class='bi bi-box-arrow-right'></i>
                    </button>
                </form>
            </li>
        </ul> -->
    </div>
</div>
