<?php
    function run($cmd, &$output = null, &$status = null) {
        return exec("$cmd 2>&1", $output, $status);
    }

    function fail($msg) { 
        output("[ERROR] $msg", true, true);
    }

    function output($msg, $newLine = true, $exit = false) { 
        echo (preg_match('/^-[^-]+/', $msg) ? ltrim($msg, '-') : '    '.$msg).($newLine ? PHP_EOL : ''); 
        if ($exit) exit;
    }

    function input() {
        $input = trim(fgets(STDIN));
        return $input;
    }

    function loopInput($msg, $options = array()) {
        $prompt = '';
        if (empty($options)) { // No options provided
           $prompt = "$msg"; 
        } else { // options+ provided
            $optionStr = '';
            foreach ($options as $index => $opt) 
                $optionStr .= $opt . (((count($options) - 1) == $index) ? '' : ',');
            $prompt = (empty($msg) ? '' : "$msg ") . "[${optionStr},q]";
        }
        $prompt .= ' : ';
        // Loop until the user gives a valid answer or quits
        while (true) {
            output($prompt, false);
            $input = input();
            if (empty($options)) { // If options are empty any answer is valid.
                if (!empty($input)) return $input;
            } else { // Must be a valid answer
                foreach ($options as $opt)
                    if ($input == $opt)     return $opt;
                    else if ($input == 'q') exit;
            }
        }
    }
?>
