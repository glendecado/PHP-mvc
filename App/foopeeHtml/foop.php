<?php

namespace foop;

class pee
{
    //tags
    //button
    function button($end = "")
    {
        if ($end == "") {
            echo '<button ';
        } else {
            echo '<' . $end . 'button>' . "\n";
        }

        return $this;
    }
    //form
    function form($end = "")
    {
        if (
            $end == ""
        ) {
            echo '<form ';
        } else {
            echo '<' . $end . 'form>' . "\n";
        }

        return $this;
    }
    function input()
    {
        echo '<input ';
        return $this;
    }

    //attributes
    function method($method)
    {
        echo 'method="' . $method . '" ';
        return $this;
    }

    function action($action)
    {
        echo 'action="' . $action . '" ';
        return $this;
    }

    function placeholder($placeholder)
    {
        echo 'placeholder="' . $placeholder . '" ';
        return $this;
    }

    function name($name)
    {
        echo 'name="' . $name . '" ';
        return $this;
    }
    function id($id)
    {
        echo 'id="' . $id . '" ';
        return $this;
    }
    function class($class)
    {
        echo 'class="' . $class . '" ';
        return $this;
    }
    function type($type)
    {
        echo 'type="' . $type . '" ';
        return $this;
    }

    function value($value)
    {
        echo 'value="' . $value . '" ';
        return $this;
    }

    function content($content)
    {
        echo $content . "\n";
        return $this;
    }
    function end()
    {
        echo '>' . "\n";
        return $this;
    }

    function br()
    {
        echo '<br>' . "\n";
        return $this;
    }
}
