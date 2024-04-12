<?php
session_start();
session_destroy();
header("location: ../tamu/beranda.php?pesan=logout");
