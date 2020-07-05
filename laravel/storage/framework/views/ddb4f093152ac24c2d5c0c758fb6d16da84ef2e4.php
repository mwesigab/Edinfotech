<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>
</head>
<body>
<div style="text-align: center;margin: 20px auto 0;">
    <?php if(isset($_GET['gateway']) && $_GET['gateway'] == 'credit'): ?>
        <?php if($_GET['mode'] == 'failed'): ?>
            <?php if($_GET['type'] == 'nocredit'): ?>
                <h4><?php echo trans('main.no_credit'); ?></h4>
                <div style="height: 20px;"></div>
                <a href="pa://nocredit">Go to application</a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(!isset($_GET['gateway']) || $_GET['gateway'] != 'credit'): ?>
        <?php if($_GET['mode'] == 'failed'): ?>
            <h4><?php echo trans('main.failed'); ?></h4>
            <div style="height: 20px;"></div>
            <a href="pa://failed">Go to application</a>
        <?php endif; ?>
            <?php if($_GET['mode'] == 'successfully'): ?>
            <h4><?php echo trans('main.successful'); ?></h4>
            <div style="height: 20px;"></div>
            <a href="pa://successfully">Go to application</a>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
