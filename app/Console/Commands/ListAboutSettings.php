<?php

namespace App\Console\Commands;

use App\Models\SiteSetting;
use Illuminate\Console\Command;

class ListAboutSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'about:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche les paramètres About Me';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $settings = SiteSetting::where('group', 'about')->get();

        if ($settings->isEmpty()) {
            $this->error('Aucun paramètre About Me trouvé.');
            return 1;
        }

        $this->info('📝 PARAMÈTRES ABOUT ME');
        $this->info('======================');
        $this->newLine();

        foreach ($settings as $setting) {
            $this->info("🔑 {$setting->key}");
            $value = strlen($setting->value) > 100
                ? substr($setting->value, 0, 100) . '...'
                : $setting->value;
            $this->line("   {$value}");
            $this->newLine();
        }

        $this->info("Total: {$settings->count()} paramètres");

        return 0;
    }
}
