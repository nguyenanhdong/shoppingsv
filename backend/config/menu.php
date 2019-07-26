<?php
/**
 * Created by PhpStorm.
 * User: ngochan
 * Date: 11/20/18
 * Time: 3:06 PM
 */
$group_admin = [
    [
        'label'        => 'Quản lý tài khoản',
        'icon'         => 'fa fa-user',
        'url'          => '/admin/assignment/index'
    ],
    [
        'label'        => 'Quản lý vai trò',
        'icon'         => 'fa fa-users',
        'url'          => '/admin/role/index'
    ],
    [
        'label'        => 'Quản lý task',
        'icon'         => 'fa fa-tasks',
        'url'          => '/admin/permission/index'
    ]
];
$group_customer         = [
    [
        'label'        => 'Danh sách khách hàng',
        'icon'         => 'fa fa-user',
        'url'          => '/customer/index'
    ],
];


// $group_report         = [
//     [
//         'label'        => 'Material',
//         'icon'         => 'fa fa-file-text',
//         'url'          => '/inventory/material'
//     ]
// ];

$group_product         = [
    [
        'label'        => 'Quản lý sản phẩm',
        'icon'         => 'fa fa-file-text',
        'url'          => '/product/index'
    ],
    [
        'label'        => 'Quản lý màu sắc',
        'icon'         => 'fa fa-file-text',
        'url'          => '/product/color'
    ],
    [
        'label'        => 'Quản lý kích thước',
        'icon'         => 'fa fa-file-text',
        'url'          => '/product/size'
    ],
    [
        'label'        => 'Quản lý category',
        'icon'         => 'fa fa-file-text',
        'url'          => '/product/category'
    ]
];

$menu_group_controller = [

    'Sản phẩm'      => [
        'level'        => 2,//Cấp menu -> 2 : Menu 2 cấp
        'controller'   => 'product',
        'child_action' => $group_product
    ],
    // 'Báo cáo'           => [
    //     'level'        => 2,//Cấp menu -> 3 : Menu 3 cấp
    //     'controller'   => 'report',
    //     'child_action' => $group_customer
    // ],
    'Khách hàng'           => [
        'level'        => 2,//Cấp menu -> 3 : Menu 3 cấp
        'controller'   => 'customer',
        'child_action' => $group_customer
    ],
    'Quản trị' => [
        'level'        => 2,//Cấp menu -> 2 : Menu 2 cấp
        'controller'   => 'assignment,role,permission',
        'child_action' => $group_admin
    ]
];

return [
    "menu" => $menu_group_controller
];
?>