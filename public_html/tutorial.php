<?php
// this is a single line comment
# this is also a single line comment
/*
this is a mulineline
comment block
*/
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<h1>PHP Practise</h1>

<p>
    <?php
    // Simple Echo statment
    echo "My First PHP Script"
    ?>
</p>

<p>
    <?php
    // varible names start with a $ sign 
    $color = "red";
    echo "the value of color is " . $color;
    ?>
</p>

<p>
    <?php
    echo "variable names are case-sensetive but keywords are not so 'echo' is the same as 'ECHO'";
    ?>
</p>

<h4>Rules for naming varibles</h4>
<ul>
    <li>A variable must start with the $ sign</li>
    <li>The name of the variable must start with either an underscore or a letter</li>
    <li>The name can't start with a number</li>
    <li>Variable Names are case sensetive</li>
</ul>

<p>
    You can interpolate text directly into an echo statement using the $ sign, for example:
</p>

<p>
    <?php
    $text = "PHP";
    echo "I Love $text"
    ?>
</p>

<p>
    You can also use the dot operator to concatenate strings
</p>

<p>
    <?php
    $text = "PHP";
    echo "I love " . $text
    ?>
</p>

<p>
    Adding a string and an integer together.
    the string is "hello" and the integer is 7.
    this operation outputs:
</p>

<p>
    <?php
    $string = "hello";
    $integer = 7;
    echo $string + $integer;
    ?>
</p>