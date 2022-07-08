<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Str;

class AddonModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addon-model {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '一次创建模块模型、控制器、迁移等文件';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));
        $snakeName = Str::snake($this->argument('name'));

        Artisan::call("module:make-model {$name} {$module}");
        Artisan::call("module:make-controller {$name}Controller {$module}");
        Artisan::call("module:make-factory {$name} {$module}");
        Artisan::call("module:make-migration create_{$snakeName}_table {$module}");
        Artisan::call("module:make-seed {$snakeName} {$module}");
        Artisan::call("module:make-policy {$name}Policy {$module}");
        Artisan::call("module:make-resource {$name}Resource {$module}");
        Artisan::call("module:make-request {$name}StoreRequest {$module}");
        Artisan::call("module:make-request {$name}UpdateRequest {$module}");
    }
}
