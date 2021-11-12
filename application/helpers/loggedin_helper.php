<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('user_id');

        if ($role_id != 1) {
            redirect('login/block');
        }
    }
}