<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!isset($this->session->userdata['logged']))
{
    redirect('login');
}
// else{
//     if ($this->session->userdata['level_admin'] == 3) {
//         // redirect();
//     }
// }