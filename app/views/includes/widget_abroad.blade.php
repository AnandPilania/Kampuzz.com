<?php
echo '<ul>';
$countries = Menu::$countries;
foreach ($countries as $country)
{
    if ($country['code'])
    {
        echo '<li><a href="';
        echo route('courses.abroad', ['country' => $country['name']]);
        echo '">' . $country['name'] . '</a>';
        //echo HTML::image("images/flags-iso/" . $country['code'] . ".png", "Study in " . $country['name'] . "\"");
        echo '</li>';
    }
}
echo '</ul>';