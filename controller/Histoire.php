<?php
    class Histoire extends Controller {
        public function __construct()
    {

    }

        public static function index()
        {
            self::render('histoire');
        }
    }
?>