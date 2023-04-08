<?php
session_start();
session_unset();
session_destroy();
header("Location:" . "/HR-Management-System");
