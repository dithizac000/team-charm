<?php
function getModal() {
    for ($i = 1; $i <= 3; $i++) {
        echo '<button data-toggle="modal" data-target="#myModal' . $i . '">Open Modal ' . $i . '</button>';
        echo '<div id="myModal' . $i . '" class="modal">';
        echo '<div class="modal-content">';
        echo '<span class="close">&times;</span>';
        echo '<p>Modal ' . $i . ' Content</p>';
        echo '</div>';
        echo '</div>';
    }
}
