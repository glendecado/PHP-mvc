<?php

namespace foop;

class pee
{
    //tags
    private function tags($tags, $end)
    {
        if (strpos($end, ":") !== false) {
            $parts = array_map('trim', explode(":", $end));
            $i = 0;
            $j = 0;
            $attr = [];
            $val = [];

            foreach ($parts as $p) {
                if ($i % 2 == 0) {
                    $attr[] = $p;
                } else {
                    $val[] = $p;
                }

                $i++;
            }
            ////
            echo "<$tags";
            foreach ($attr as $a) {
                echo " $a =\"" . $val[$j] . "\"";
                $j++;
            }
            echo ">\n";
            ////
        }
        //
        else if ($end == "") {
            echo "<$tags>\n";
        }
        //
        else if ($end == "/") {
            echo "</$tags>\n";
        }
        //
        else {
            echo "<$tags>$end</$tags>\n";
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

    //$data, ["ID", "username", "email" "name"] everythin from database;
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

    function br()
    {
        echo '<br>' . "\n";
        return $this;
    }

    function cont($end)
    {
        echo "$end \n";
        return $this;
    }
}
