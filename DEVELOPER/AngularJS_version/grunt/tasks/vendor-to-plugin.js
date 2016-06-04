var fs = require('fs-extra');

var _ = require('lodash');

var pkg = require('../package.json');

var pluginDir = __dirname + '/../' + pkg.smartadmin.plugin;
var vendorDir = __dirname + '/../' + pkg.smartadmin.vendor;

var dependencies = require('./vendor-to-plugin-files.json');


module.exports = function (grunt) {

    grunt.registerTask('vendor-to-plugin',
        'copy required files from vendor packages to plugin directory', function () {

            if (fs.existsSync(vendorDir)) {
                _(dependencies).forEach(function (dependency) {

                    if (fs.existsSync(vendorDir + dependency)) {
                        fs.copySync(vendorDir + dependency, pluginDir + dependency);
                    } else {
                        throw grunt.util.error('Required path doesn\'t exist: ' + vendorDir + dependency)
                    }

                })

            }
        });
};