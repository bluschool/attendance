<?php namespace Bluschool\Attendance;

use Orchestra\Support\Providers\ServiceProvider;


class AttendanceServiceProvider extends ServiceProvider
{
    /**
     * Register service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../');

        $this->addConfigComponent('bluschool/attendance', 'bluschool/attendance', $path.'/resources/config');
        $this->addLanguageComponent('bluschool/attendance', 'bluschool/attendance', $path.'/resources/lang');
        $this->addViewComponent('bluschool/attendance', 'bluschool/attendance', $path.'/resources/views');

        $this->mapExtensionConfig();
        $this->bootExtensionRouting($path);
        $this->bootExtensionMenuEvents();
    }


    /**
     * Boot extension menu handler.
     *
     * @return void
     */
    protected function bootExtensionMenuEvents()
    {
        $this->app['events']->listen('orchestra.ready: admin', 'Bluschool\Attendance\Http\Handlers\AttendanceMenuHandler');
    }

    /**
     * Boot extension routing.
     *
     * @param  string  $path
     *
     * @return void
     */
    protected function bootExtensionRouting($path)
    {
        $this->app['router']->filter('media.manage', 'Orchestra\Foundation\Http\Filters\CanManage');
        $this->app['router']->filter('media.csrf', 'Orchestra\Foundation\Http\Filters\VerifyCsrfToken');

        require_once "{$path}/src/routes.php";
    }


    /**
     * Map extension config.
     *
     * @return void
     */
    protected function mapExtensionConfig()
    {
        $this->app['orchestra.extension.config']->map('bluschool/attendance', [
            'admin_role'  => 'orchestra/foundation::roles.admin',
            'member_role' => 'orchestra/foundation::roles.member',
        ]);
    }
}