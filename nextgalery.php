<?php

$description = $_POST["d"];

if (empty($description)) {
    echo "Please Enter description";
} else if (strlen($description) > 1500) {
    echo "Youer Description Max Text legnth 500";
} else if (strlen($description) < 100) {
    echo "Youer Description min Text legnth 100";
} else {
    echo "sucsess";
}
