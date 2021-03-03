<tr>
    <td class="header">
        <a href="<?php echo e($url); ?>" style="display: block;">

            <?php if(trim($slot) === 'Laravel'): ?>
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
                <span><?php echo e($slot); ?></span>
            <?php else: ?>
                <img src="<?php echo e(asset('images/logos/logo_smacve.png')); ?>" class="logo" alt="SMACVE" style=" width: 90px;">
            <?php endif; ?>
        </a>
    </td>
</tr>
