<?php
    class View{
        static private function get($file,$result=null){
            $result=$result;                /* it's the result we get from the model by the ctr
                                            somme pages may need it to show there content
                                            its probably gonna be an array in case we need more
                                            then one result . */
            ob_start();
            require "content/$file.php";
            return ob_get_clean();
        }
        static public function show($file,$result=null){
            $content=View::get($file,$result);
            require 'TEMPLATE.PHP';
        }
    };