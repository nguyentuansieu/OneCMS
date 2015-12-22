<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {

        $auth = Yii::$app->authManager;

//        //Create Member permission
//        $memberPermission = $auth->createPermission('_member');
//        $memberPermission->description = "Permission of Member";
//        $auth->add($memberPermission);
//        //Create Author permission
//        $authorPermission = $auth->createPermission('_author');
//        $authorPermission->description = "Permission of Author";
//        $auth->add($authorPermission);
//        //Create Editor permission
//        $editorPermission = $auth->createPermission('_editor');
//        $editorPermission->description = "Permission of Editor";
//        $auth->add($editorPermission);
//        //Create Manager permission
//        $managerPermission = $auth->createPermission('_manager');
//        $managerPermission->description = "Permission of Manager";
//        $auth->add($managerPermission);
//        //Create Admin permission
//        $adminPermission = $auth->createPermission('_admin');
//        $adminPermission->description = "Permission of Admin";
//        $auth->add($adminPermission);

        //Create role member
        $memberRole = $auth->createRole('member');
        $auth->add($memberRole);
//        $auth->addChild($memberRole, $memberPermission);
        //Create role author
        $authorRole = $auth->createRole('author');
        $auth->add($authorRole);
//        $auth->addChild($authorRole, $authorPermission);
        //Create role editor
        $editorRole = $auth->createRole('editor');
        $auth->add($editorRole);
//        $auth->addChild($editorRole, $editorPermission);
        //Create role manager
        $managerRole = $auth->createRole('manager');
        $auth->add($managerRole);
//        $auth->addChild($managerRole, $managerPermission);
        //Create role admin
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);
//        $auth->addChild($adminRole, $adminPermission);

        //Default assign
        $auth->assign($adminRole, 1);
    }
}
