<?php

use yii\bootstrap5\Html;

return [
        ['label' => 'My wishes', 'url' => ['/wish']],
        ['label' => 'Settings', 'url' => ['/site/upload']],
        '<li class="nav-item">'
        . Html::beginForm(['/site/logout'])
        . Html::submitButton(
            'Sign out (' . Yii::$app->user->identity->username . ')',
            ['class' => 'nav-link btn btn-link logout']
        )
        . Html::endForm()
        . '</li>'
];