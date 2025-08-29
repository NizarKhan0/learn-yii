<?php
use yii\helpers\Url;
?>

<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?= Url::base(true) ?>/images/img.jpg" alt="">John Doe
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a>
                        </li>
                        <li>
                            <?= Yii::$app->user->isGuest ? (
                                '<a href="index.php?r=site/login"><i class="fa fa-sign-in pull-right"></i> Log In</a>'
                            ) : '<a data-method="post" href="' . Url::to(['/site/logout']) . '"><i class="fa fa-sign-out pull-right">
                                        </i> Log Out (' . Yii::$app->user->identity->username . ')</a>'
                            ?>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>

</div>