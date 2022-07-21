<?php
    namespace application\controllers;

    class UserController extends Controller {
        public function signup() {
            $json = getJson(); //객체가 아니라 배열로 넘어온다
            $result = $this->model->signup($json);
            if($result) {
                $this->flash(_LOGINUSER, $result);
                return [_RESULT => $result];
            }
            return [_RESULT => 0];
        }

        public function logout() {
            $this->flash(_LOGINUSER);
            return [_RESULT => 1];
        }
    }