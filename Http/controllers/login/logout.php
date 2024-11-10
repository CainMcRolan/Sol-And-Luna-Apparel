<?php

use Core\Session;

Session::destroy();

redirect('/home');