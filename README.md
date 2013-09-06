php-cli-helper
===================

A simple class to make php shell scripts easier to write.

All you need to do is require CLI.php and you are good to go. 

###### Logging
-------------------------

Before you get started you should consider enabling logging so you can see what is happening with your scripts.

```php
  CLI::setLogFile(dirname(__FILE__).'/tell-me-everything.log');
```

###### Output
-------------------------
```php
  CLI::out("This text is indented");
  // Adding false as the second parameter will remove the newline
  CLI::out('Working...', false);
  // Adding a dash at the beginning will remove the indent
  CLI::out('-Done.');
  // Here are some status functions, these functions color the 
  // tag to indicate the status. (Although I cant show that here.)
  CLI::info('Testing something...');
  CLI::warning('Uh oh. Be cautious.');
  CLI::success('Awesome it worked!');
  CLI::error('O no. That didnt work.');
  // Fail will exit the script for you.
  CLI::fail('Something really bad happened exit the script');
  // Create your own custom status with the following
  // Check the resources/colors.php for specific color constants.
  CLI::custom('ALERT', CLI_UND_WHITE, 'Check out my white underlined text');
  // Want to use color text in your output? No problem just use the following.
  $coloredText = CLI::color('Chason Choate', CLI_DARK_BLUE);
  CLI::out("Hi my name is $coloredText.");
  
  
  // Output
  This text is indented
  Working...Done.
  [INFO] Testing something...
  [WARNING] Uh oh. Be cautious.
  [SUCCESS] Awesome it worked!
  [ERROR] O no. That didnt work.
  [ERROR] Something really bad happened exit the script
  [ALERT] Check out my white underlined text
  Hi my name is Chason Choate.
```

###### Input
-------------------------
There are two functions available for getting user input.
```php
  $answer = CLI::in("What's your favorite beer?");
  // With loopIn you can specify responses the user must enter or quit
  // If the user enters an invalid input it will show the prompt again.
  $answer = CLI::loopIn("What's your favorite OS?", array("Mac", "Windows"));
  if ($answer == 'Mac')
    CLI::out("Macs are pretty cool.");
  // Output
  What's your favorite beer? : <user types here and hits enter>
  What's your favorite OS? [Mac,Windows,q] : Linux
  What's your favorite OS? [Mac,Windows,q] : Mac
  Macs are pretty cool.
```

###### Running commands/scripts
---------------------------
This is how you make stuff happen and catch any errors if they occur.
```php
  CLI::run("cp test-dir test-dir-2");
  // After the command completes there are two important pieces of info you need
  // CLI::$lastCmdStatus => Int, Holds the exit status of the command.
  // Exit status: 0 typically means the script finished successfully.
  // CLI::$lastCmdOutput => Array, holds the output lines from the command.
  if (CLI::$lastCmdStatus !== 0)
      CLI::fail("Could not copy the directory.");
```

###### Advanced stuff
---------------------------
Below are some examples of additional functions in the CLI class.
```php
  // The outLine function will output a string on the same line
  // good for counting/percentages/etc.
  for ($i = 0; $i < 1000; $i++)
    CLI::outLine($i);
    
  // Checkout the progress example script for how to use the progress function.
  Downloading a really large file...
  2% [=>------------------------------------] 00:10
```

