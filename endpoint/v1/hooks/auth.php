<?php
$white_list = array(
    'register',
    'login',
    'reset_password',
    'social_login',
    'get_options',
    'get_gifts',
    'get_stickers'
);
if (!in_array($_id, $white_list)) {
    if (isset($_REQUEST['access_token'])) {
        $uid = GetUserFromSessionID(Secure($_REQUEST['access_token']));
        if ($uid == null) {
            json(array(
                'message' => 'Permission Denied',
                'code' => 401,
                'errors' => array(
                    'error_id' => '201',
                    'error_text' => 'Permission Denied'
                )
            ), 401);
        }
    } else {
        json(array(
            'message' => 'Permission Denied',
            'code' => 401,
            'errors' => array(
                'error_id' => '201',
                'error_text' => 'Permission Denied'
            )
        ), 401);
    }
}
