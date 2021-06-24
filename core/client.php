<?php

    class Client {
        protected $id, $fName, $lName, $phone, $email;

        public function __construct(int $id, string $fName, string $lName, string $phone, string $email)
        {
            $this->id = $id;
            $this->fName = $fName;
            $this->lName = $lName;
            $this->phone = $phone;
            $this->email = $email;
        }

        public function getId() {
            return $this->id;
        }

        public function getfName() {
            return $this->fName;
        }

        public function getlName() {
            return $this->lName;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getEmail() {
            return $this->email;
        }
    }

?>