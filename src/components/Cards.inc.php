<?php
    class Cards{

        public static function errorCard($message){
            return '
                    <link rel="stylesheet" href="./public/css/componentsCSS/cards.css">
                    <div class="CardsCard errorCard">
                        <p><strong>Error:</strong> ' . $message . '</p>
                    </div>';
        }

        public static function correctCard($message){
            return '
                    <link rel="stylesheet" href="./public/css/componentsCSS/cards.css">
                    <div class="CardsCard correctCard">
                        <p><strong>Correcto:</strong> ' . $message . '</p>
                    </div>';
        }

        public static function alertCard($message){
            return '
                    <link rel="stylesheet" href="./public/css/componentsCSS/cards.css">
                    <div class="CardsCard alertCard">
                        <p><strong>Alerta:</strong> ' . $message . '</p>
                    </div>';
        }

    }


?>