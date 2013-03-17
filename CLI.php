<?php
    class CLI {
        public static $outputPrefix = '    ';
        // Variables to hold the output and status
        // of the last ran command.
        public static $lastCmdStatus = false;
        public static $lastCmdOutput = false;

        /**
         * Outputs data to the cmdline. The output will be tabbed to 
         * differientiate from the prompt/etc.
         * 
         * @param string $msg The data you would like to post to the screen. If $msg starts with
         *                    a single '-' then the prefix will be excluded.
         * @param boolean $newLine Do you want a newline at the end or not?
         * @param boolean $exit Do you want to exit after printing the message or not?
         *
         * @return none.
         */
        public static function output($msg = '', $newLine = true, $exit = false) { 
            echo (preg_match('/^-[^-]+/', $msg) ? 
                ltrim($msg, '-') : 
                self::$outputPrefix.$msg).($newLine ? PHP_EOL : ''); 
            if ($exit) exit;
        }

        /**
         * Simply takes input from the user.
         *
         * @return string Whatever the user enters and then presses enter.
         */
        public static function input() {
            $input = trim(fgets(STDIN));
            return $input;
        }

        /**
         * An extension of the input function, loopInput will keep looping until
         * the user either enters a proper supplied input, if options is set, or 'q' to quit.
         *
         * @param string $msg The prompt to show the user for input.
         * @param array $options An array of strings representing valid input. If empty any input is valid.
         *
         * @return string A valid input option.
         */
        public static function loopInput($msg = '', $options = array()) {
            $prompt = '';
            if (empty($options)) { // No options provided
            $prompt = "$msg"; 
            } else { // options+ provided
                $optionStr = '';
                foreach ($options as $index => $opt) 
                    $optionStr .= $opt . (((count($options) - 1) == $index) ? '' : ',');
                $prompt = (empty($msg) ? '' : "$msg ") . "[${optionStr},q] ";
            }
            $prompt .= ': ';
            // Loop until the user gives a valid answer or quits
            while (true) {
                self::output($prompt, false);
                $input = self::input();
                if (empty($options)) { // If options are empty any answer is valid.
                    if (!empty($input)) return $input;
                } else { // Must be a valid answer
                    foreach ($options as $opt) {
                        if ($input == $opt)     return $opt;
                        else if ($input == 'q') exit;
                    }
                }
            }
        }

        /**
         * Run a shell command. Stderr is redirected to stdout. The output and status 
         * are stored in the class' static variables.
         *
         * @param string $cmd Any shell command. ex. 'cp -r ./here ~/there'
         *
         * @return string The last line from the cmd.
         */
        public static function run($cmd) {
            self::$lastCmdOutput = false;
            self::$lastCmdStatus = false;
            return exec("$cmd 2>&1", self::$lastCmdOutput, self::$lastCmdStatus);
        }

        /**
         * Outputs a message with an error tag, then exits.
         *
         * @param string $msg A string describing why an error occurred.
         *
         * @return none.
         */
        public static function fail($msg) { 
            self::output("[ERROR] $msg", true, true);
        }

        /**
         * Outputs a message with an info tag.
         *
         * @param string $msg A string detailing that something occurred.
         *
         * @return none.
         */
        public static function info($msg) { 
            self::output("[INFO] $msg", true, true);
        }

    }
?>
