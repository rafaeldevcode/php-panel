<div class='flex flex-nowrap items-center shadow-md p-2 sticky top-0'>
    <div class='w-[45px] h-[45px]'>
        <a href='<?php route('/admin/profile') ?>' title='<?php _e('Edit profile') ?>'>
            <img class='border rounded-full border-color-main' src='<?php asset("assets/images/users/{$_SESSION['user_avatar']}") ?>' alt='<?php echo $_SESSION['user_name'] ?>' />
        </a>
    </div>
    
    <div class='opacity-1 block md:opacity-0 md:hidden profile-dropdawn ml-2'  data-item-active='false'>
        <a href='<?php route('/admin/profile') ?>' title='<?php _e('View and edit profile') ?>' class='profile-dropdawn-btn w-full text-light font-bold' aria-expanded='false'>
            <?php echo explode(' ', $_SESSION['user_name'])[0] ?>
        </a>

        <!-- <ul class='dropdown-menu dropdown-menu-dark'>
            <li>
                <a title="<?php _e('Edit profile') ?>" href='<?php route('/admin/profile') ?>' class='dropdown-item flex flex-row justify-between'>
                    <?php _e('Profile') ?>
                    <i class='bi bi-person-bounding-box'></i>
                </a>
            </li>
            <li>
                <form action="<?php route('/login/logout.php') ?>" method="POST">
                    <button type="submit" title="<?php _e('Log out') ?>" class='dropdown-item flex flex-row justify-between'>
                        <?php _e('Log out') ?>
                        <i class='bi bi-box-arrow-right'></i>
                    </button>
                </form>
            </li>
        </ul> -->
    </div>
</div>
