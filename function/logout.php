<?php
session_start();
session_destroy();
header("Location: /transgo/view/login.php");
