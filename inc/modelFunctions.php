<?php

# Model layer of an hypothetical MVC

#in the real wolrd, this would return the result of a SQL query
# or something similar
function loadDatas() : array {
    return [
             '32' => [
                'name' => 'cookies',
                'infos' => 'Cooked by Penny&nbsp;!'
             ],
             '36' => [
                'name' => 'Chocolate chips',
                'infos' => 'Cooked by Bernadette&nbsp;!'
             ],
             '42' => [
                'name' => 'chocolate cake',
                'infos' => 'made with love by Brutus'
             ],
             '46' => [
                'name' => 'Pecan nuts',
                'infos' => 'Cooked by Penny&nbsp;!'
             ],
             '58' => [
                'name' => 'Chocolate cookies',
                'infos' => 'Cooked by Bernadette&nbsp;!'
             ]
    ];
}