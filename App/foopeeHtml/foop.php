<?php

namespace foop;

class pee
{
    //tags
    function tags($tags, $end)
    {
        if ($end == "") {
            echo "<$tags>\n";
        } else if ($end == "-") {
            echo "<$tags ";
        } else if ($end == ">") {
            echo ">\n";
        } else if ($end == "/") {
            echo "</$tags>\n";
        } else {
            echo "<$tags> $end </$tags>\n";
        }
        return $this;
    }
    //button
    function button($end = "")
    {
        self::tags("button", $end);
        return $this;
    }

    //form
    function form($end = "")
    {
        self::tags("form", $end);
        return $this;
    }

    function input($end = "")
    {
        self::tags("input", $end);
        return $this;
    }

    //table

    function table($end = "")
    {
        self::tags("table", $end);
        return $this;
    }
    function thead($end = "")
    {
        self::tags("thead", $end);
        return $this;
    }

    function tbody($end = "")
    {
        self::tags("tbody", $end);
        return $this;
    }

    function tfoot($end = "")
    {
        self::tags("tfoot", $end);
        return $this;
    }

    function tr($end = "")
    {
        self::tags("tr", $end);
        return $this;
    }

    function tdData($array, $values)
    {

        foreach ($array as $key) {
            foreach ($values as $val) {
                echo "<td>" . $key[$val] . "</td>\n";
            }
        }

        return $this;
    }
    function th($end = "")
    {
        self::tags("th", $end);
        return $this;
    }

    function td($end = "")
    {
        self::tags("td", $end);
        return $this;
    }


    //attributes

    function attributes($atributes, $value)
    {

        echo "$atributes=\"$value\"";
        return $this;
    }

    function method($method)
    {
        self::attributes("method", $method);
        return $this;
    }

    function action($action)
    {
        self::attributes("action", $action);
        return $this;
    }

    function placeholder($placeholder)
    {
        self::attributes("placeholder", $placeholder);
        return $this;
    }

    function name($name)
    {
        self::attributes("name", $name);
        return $this;
    }
    function id($id)
    {
        self::attributes("id", $id);
        return $this;
    }
    function class($class)
    {
        self::attributes("class", $class);
        return $this;
    }
    function type($type)
    {
        self::attributes("type", $type);
        return $this;
    }

    function value($value)
    {
        self::attributes("value", $value);
        return $this;
    }

    function content($content)
    {
        echo $content . "\n";
        return $this;
    }

    function br()
    {
        echo '<br>' . "\n";
        return $this;
    }
}
