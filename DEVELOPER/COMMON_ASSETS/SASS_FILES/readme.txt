CREDITS: Alexandre Azevedo <http://github.com/alexndreazevedo>

========= README ==========

1 - Install Ruby
    1.1 - If you are using Linux, download via apt-get
          > sudo apt-get install ruby irb doc

    1.2 - If you are using MacOS, download from terminal via DarwyinPorts
          > port install ruby

    1.3 - If you are using Windows, download download the install package from Official Ruby website (ruby-lang.org/en/downloads).
          CAUTION: Dont forget to choose "Install Ruby on Windows PATH" to Ruby installation works on CMD.

2 - Install Compass on Ruby.
    > gem install compass

3 - Copy the folder where config.rb is located to inside of "css" folder of chosen version of SmartAdmin (HTML_version/css, e.g) to install the Sass project.

4 - Change terminal to folder where the config.rb is located.
    > cd <folder> (Linux or Mac)
    > dir <folder> (Windows based)

5 - Run Compass to compile Sass.
    > compass compile

6 - The compiled files will be put in "css" folder of chosen version of SmartAdmin (HTML_version/css, e.g).

7 - For detailed information, please ask for help on terminal.
    > compass -h

