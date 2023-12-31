<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'users'             => 'Users',
            'users_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'unit' => [
        'title'          => 'Units',
        'title_singular' => 'Unit',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'unit_name'                   => 'Unit Name',
            'unit_name_helper'            => ' ',
            'unit_code'                   => 'Booking Ref',
            'unit_code_helper'            => ' ',
            'unit_checkin'                => 'Unit Checkin',
            'unit_checkin_helper'         => ' ',
            'unit_checkout'               => 'Unit Checkout',
            'unit_checkout_helper'        => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'team'                        => 'Team',
            'team_helper'                 => ' ',
            'unit_lock'                   => 'Unit Lock',
            'unit_lock_helper'            => ' ',
            'unit_images'                 => 'Unit Images',
            'unit_images_helper'          => ' ',
            'booked_by'                   => 'Booked By',
            'booked_by_helper'            => ' ',
            'unit_status'                 => 'Unit Status',
            'unit_status_helper'          => ' ',
            'unit_connectivity'           => 'Unit Connectivity',
            'unit_connectivity_helper'    => 'Add connectivity instructuions like (Wifi password and SSID or Cable Connection etc)',
            'unit_parking'                => 'Unit Parking',
            'unit_parking_helper'         => ' ',
            'oven'                        => 'Oven',
            'oven_helper'                 => ' ',
            'laundry'                     => 'Laundry',
            'laundry_helper'              => ' ',
            'dishwasher'                  => 'Dishwasher',
            'dishwasher_helper'           => ' ',
            'coffee_machine'              => 'Coffee Machine',
            'coffee_machine_helper'       => ' ',
            'fireplace'                   => 'Fireplace',
            'fireplace_helper'            => ' ',
            'tv'                          => 'T.V',
            'tv_helper'                   => ' ',
            'iron'                        => 'Iron',
            'iron_helper'                 => ' ',
            'private_entrance'            => 'Private Entrance',
            'private_entrance_helper'     => ' ',
            'outdoor_sitting_area'        => 'Outdoor Sitting Area',
            'outdoor_sitting_area_helper' => ' ',
            'office_desk'                 => 'Office Desk',
            'office_desk_helper'          => ' ',
            'balcony'                     => 'Balcony',
            'balcony_helper'              => ' ',
            'unit_latitude'               => 'Unit Latitude',
            'unit_latitude_helper'        => 'For example: 26.424894',
            'unit_longitude'              => 'Unit Longitude',
            'unit_longitude_helper'       => 'For example: 50.094790',
            'unit_city'                   => 'Unit City',
            'unit_city_helper'            => ' ',
            'unit_district'               => 'Unit District',
            'unit_district_helper'        => ' ',
            'building_no'                 => 'Building No',
            'building_no_helper'          => ' ',
        ],
    ],
    'mobileAppSetting' => [
        'title'          => 'Mobile App Settings',
        'title_singular' => 'Mobile App Setting',
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Event',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Attributes',
            'properties_helper'   => ' ',
            'host'                => 'IP',
            'host_helper'         => ' ',
            'created_at'          => 'Event time',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned To',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'taskCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'property' => [
        'title'          => 'Properties',
        'title_singular' => 'Property',
    ],
    'location' => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'location_name'        => 'Location name',
            'location_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'team'                 => 'Team',
            'team_helper'          => ' ',
            'district'             => 'District',
            'district_helper'      => 'For example: Al-Malga',
        ],
    ],
'news' => [
        'title'          => 'News',
        'title_singular' => 'News',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'post_name'           => 'Post Name',
            'post_name_helper'    => ' ',
            'post_content'        => 'Post Content',
            'post_content_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'post_image'          => 'Post Feature Image',
            'post_image_helper'   => ' ',
        ],
    ],

];
