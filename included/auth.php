<?php
function get_session_code() {
    if (isset($_SESSION["code"])) {
        return $_SESSION["code"];
    }
    header("Location: index.php");
    exit;
}

function get_session_day() {
    if (isset($_SESSION["day"])) {
        return $_SESSION["day"];
    }
    header("Location: day.php");
    exit;
}

function get_session_session_idx() {
    if (!isset($_SESSION["session_idx"])) {
        $_SESSION["session_idx"] = 0;
    }
    return $_SESSION["session_idx"];
}

function get_session_mov_idx() {
    if (!isset($_SESSION["mov_idx"])) {
        $_SESSION["mov_idx"] = 0;
    }
    return $_SESSION["mov_idx"];
}
