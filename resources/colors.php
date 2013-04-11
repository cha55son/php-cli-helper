<?php
    define("CLI_COLOR_START", "\033[");
    define("CLI_COLOR_END"  , "\033[0m");

    // Forground colors
    define("CLI_BLACK"      , CLI_COLOR_START."0;30m"); 
    define("CLI_BLUE"       , CLI_COLOR_START."1;34m");
    define("CLI_BROWN"      , CLI_COLOR_START."0;33m");
    define("CLI_CYAN"       , CLI_COLOR_START."1;36m");
    define("CLI_GRAY"       , CLI_COLOR_START."0;37m");
    define("CLI_GREEN"      , CLI_COLOR_START."1;32m");
    define("CLI_PURPLE"     , CLI_COLOR_START."1;35m");
    define("CLI_RED"        , CLI_COLOR_START."1;31m");
    define("CLI_WHITE"      , CLI_COLOR_START."1;37m");
    define("CLI_YELLOW"     , CLI_COLOR_START."1;33m");

    define("CLI_DARK_BLUE"  , CLI_COLOR_START."0;34m");
    define("CLI_DARK_CYAN"  , CLI_COLOR_START."0;36m");
    define("CLI_DARK_GRAY"  , CLI_COLOR_START."1;30m");
    define("CLI_DARK_GREEN" , CLI_COLOR_START."0;32m");
    define("CLI_DARK_PURPLE", CLI_COLOR_START."0;35m");
    define("CLI_DARK_RED"   , CLI_COLOR_START."0;31m");

    define("CLI_UND_BLACK"  , CLI_COLOR_START."4;30m");
    define("CLI_UND_BLUE"   , CLI_COLOR_START."4;34m");
    define("CLI_UND_CYAN"   , CLI_COLOR_START."4;36m");
    define("CLI_UND_GREEN"  , CLI_COLOR_START."4;32m");
    define("CLI_UND_PURPLE" , CLI_COLOR_START."4;35m");
    define("CLI_UND_RED"    , CLI_COLOR_START."4;31m");
    define("CLI_UND_WHITE"  , CLI_COLOR_START."4;37m");
    define("CLI_UND_YELLOW" , CLI_COLOR_START."4;33m");

    // Background colors
    define("CLI_BG_BLACK"   , CLI_COLOR_START."40m");
    define("CLI_BG_BLUE"    , CLI_COLOR_START."44m");
    define("CLI_BG_CYAN"    , CLI_COLOR_START."46m");
    define("CLI_BG_GRAY"    , CLI_COLOR_START."47m");
    define("CLI_BG_GREEN"   , CLI_COLOR_START."42m");
    define("CLI_BG_MAGENTA" , CLI_COLOR_START."45m");
    define("CLI_BG_RED"     , CLI_COLOR_START."41m");
    define("CLI_BG_WHITE"   , CLI_COLOR_START."107m");
    define("CLI_BG_YELLOW"  , CLI_COLOR_START."43m");
?>
