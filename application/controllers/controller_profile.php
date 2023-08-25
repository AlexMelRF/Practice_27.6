<?php

class Controller_Profile extends Controller {
    public function action_index() {
        $this -> view -> generate('profile_view.php', 'template_view.php');
    }
}

?>

