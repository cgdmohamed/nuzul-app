<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'team_create',
            ],
            [
                'id'    => 24,
                'title' => 'team_edit',
            ],
            [
                'id'    => 25,
                'title' => 'team_show',
            ],
            [
                'id'    => 26,
                'title' => 'team_delete',
            ],
            [
                'id'    => 27,
                'title' => 'team_access',
            ],
            [
                'id'    => 28,
                'title' => 'unit_create',
            ],
            [
                'id'    => 29,
                'title' => 'unit_edit',
            ],
            [
                'id'    => 30,
                'title' => 'unit_show',
            ],
            [
                'id'    => 31,
                'title' => 'unit_delete',
            ],
            [
                'id'    => 32,
                'title' => 'unit_access',
            ],
            [
                'id'    => 33,
                'title' => 'mobile_app_setting_create',
            ],
            [
                'id'    => 34,
                'title' => 'mobile_app_setting_edit',
            ],
            [
                'id'    => 35,
                'title' => 'mobile_app_setting_show',
            ],
            [
                'id'    => 36,
                'title' => 'mobile_app_setting_delete',
            ],
            [
                'id'    => 37,
                'title' => 'mobile_app_setting_access',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 39,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 40,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 42,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 43,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 44,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 45,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 46,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 47,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 48,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 49,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 50,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 51,
                'title' => 'task_create',
            ],
            [
                'id'    => 52,
                'title' => 'task_edit',
            ],
            [
                'id'    => 53,
                'title' => 'task_show',
            ],
            [
                'id'    => 54,
                'title' => 'task_delete',
            ],
            [
                'id'    => 55,
                'title' => 'task_access',
            ],
            [
                'id'    => 56,
                'title' => 'task_calendar_access',
            ],
            [
                'id'    => 57,
                'title' => 'property_access',
            ],
            [
                'id'    => 58,
                'title' => 'location_create',
            ],
            [
                'id'    => 59,
                'title' => 'location_edit',
            ],
            [
                'id'    => 60,
                'title' => 'location_show',
            ],
            [
                'id'    => 61,
                'title' => 'location_delete',
            ],
            [
                'id'    => 62,
                'title' => 'location_access',
            ],
            [
                'id'    => 63,
                'title' => 'news_create',
            ],
            [
                'id'    => 64,
                'title' => 'news_edit',
            ],
            [
                'id'    => 65,
                'title' => 'news_show',
            ],
            [
                'id'    => 66,
                'title' => 'news_delete',
            ],
            [
                'id'    => 67,
                'title' => 'news_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
