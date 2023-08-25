<?php

class Controller_Signup extends Controller {
    public function action_index() {
	$this -> view -> generate('signup_view.php', 'template_view.php');
    }
}

?>