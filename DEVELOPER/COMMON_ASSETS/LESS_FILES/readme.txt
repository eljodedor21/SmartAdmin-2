**********************************************************************
                     -- COMPILE INSTRUCTIONS -- 
**********************************************************************

To generate your CSS file from these LESS files. Download winLess from going to http://winless.org/ (for windows) and mac users can go to (http://incident57.com/less/) - they are both small apps/programs. 

Once installed load up and drop in the less folder to the 'Less Files' zone. Deselect all selected less files and only select "smartadmin-production.less" or "bootstrap.less" - depending on what CSS file you are after. 

Hit compile and it should automatically create a minified CSS file to your css directory!

If you are still having issues compiling, send me a message by logging on to wrapbootstrap.com


PS. You can also use Prepros, another alternative LESS compiler with greater CSS compression! 

Download link: http://alphapixels.com/prepros/ 

**********************************************************************
**********************ALTERNATE TO MAC VERSION************************
**********************************************************************

1) read this overview about how to set up a web server locally on your machine: https://discussions.apple.com/docs/DOC-3083

Note: enough to set up the php part, no need (at least at this point) for the perl part

2) ~your_name/Sites must be the folder where there must be an index.html file, and thus if you go in your browser to http://localhost/~your_name/ it will just pop up nicely the content of index.html

3) Go to SmartAdmin folder you downloaded from wrapbootstrap. Go into the build/ folder and copy its entire content into Sites/. On this way the index.html in the build will be the one what your local server will serve up, and now you can see SmartAdmin dashboard with ajax served from your local server.