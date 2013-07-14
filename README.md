phpBB Status Site
=================

This is the repository for the site created on [status.phpbb.com](http://status.phpbb.com)

Install
-------

1. Clone the repository
2. Copy `app/config/parameters.dist.yml` to `app/config/parameters.yml` and adjust confiuration as needed.
3. Run:

    $ php composer.phar install

4. Run php app/console doctrine:migrations:migrate to create the initial tables for the site.

5. Run php app/console pingdom:update to initialise the database with initial values.

6. The status site uses the FOSUserBundle for managing users, to create a user via the command line you can use the next commands: https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/command_line_tools.md

7. In case the intl extension isn't working (Like on bluehost), and icu-dev ins't available, you can use https://github.com/kbsali/sf2-icu as replacement.

8. Everything can be managed via the admin page: http://status.example.com/admin/OPTION, where OPTION can be:
   - sites
   - updates
   - checks
   - overides

License
-------
[GNU GPL v3](http://opensource.org/licenses/gpl-3.0)

By contributing you agree to assign copyright of your code to phpBB Limited.

See `LICENSE` for the full license.

Maintenance
-------------

To contribute fork the repo, make your changes in a feature branch and send a pull request

The site is maintained by the [phpBB Website Team](https://www.phpbb.com/community/memberlist.php?mode=group&g=47077)

Should you wish to report a bug report it at [The phpBB Website Bug Tracker](https://www.phpbb.com/bugs/website/)
