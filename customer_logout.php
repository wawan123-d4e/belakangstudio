<?php
session_start();

unset(
    $_SESSION['customer'],
    $_SESSION['cart'],
    $_SESSION['payment_method'],
    $_SESSION['bukti_qris']
);

header("Location: index.php");
exit;
