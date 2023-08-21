<div class='d-flex flex-nowrap align-items-center shadow p-2 profile'>
    <div class='user'>
        <a href='<?php route('/admin/profile') ?>' title='Editar perfil de Rafael'>
            <img class='border border-color-main w-100' src='<?php asset("assets/images/users/{$_SESSION['user_avatar']}") ?>' alt='<?php echo $_SESSION['user_name'] ?>' />
        </a>
    </div>
    <div class='btn-group hiddeItem dNone profile-dropdawn'  data-item-active='false'>
        <a href='<?php route('/admin/profile/edit') ?>' title='Ver e editar perfil' class='btn profile-dropdawn-btn w-100 text-cm-light fw-bold' aria-expanded='false'>
            <?php echo explode(' ', $_SESSION['user_name'])[0] ?>
        </a>
        <ul class='dropdown-menu dropdown-menu-dark list-unstyled'>
            <li>
                <a href='<?php route('/admin/profile/edit') ?>' class='dropdown-item d-flex flex-row justify-content-between'>
                    Perfil
                    <i class='bi bi-person-bounding-box'></i>
                </a>
            </li>
            <li>
                <form action="<?php route('/login/logout.php') ?>" method="POST">
                    <button type="submit" title="Fazer logout" class='dropdown-item d-flex flex-row justify-content-between'>
                        Logout
                        <i class='bi bi-box-arrow-right'></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
