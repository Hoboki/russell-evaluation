<?php
include("included/session_start.php");
session_destroy();
header("Location: index.php");
exit;
