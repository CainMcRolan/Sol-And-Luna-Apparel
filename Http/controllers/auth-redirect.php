<?php

use Core\Session;

Session::flash('login', 'Auth Required');
redirect('/login');