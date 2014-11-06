<?php
class auth extends spController
{
    function index(){
        echo "Enjoy, Speed of PHP!";
    }

    public function signup(){
        $args = $this->getInput();
    }

    public function login(){
        $args = $this->getInput();

        $args['username'] = $args['displayName'];
        unset($args['display_name']);

        $member = spClass("db_member");
        $member->verifier = $member->verifier_login;

        if( false == $member->spVerifier($args) ){



        }else{
            $err = $member->spVerifier($this->spArgs());
            foreach($err as $d){$errs[] = $d;}
            $this->errmsg = $errs[0][0];

        }

    }

    public function getInput(){
        return json_decode(file_get_contents("php://input"), true);
    }
}