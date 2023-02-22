<?php

namespace TigerHeck\Vcita\Console;

use Illuminate\Console\Command;
use Http;

class VcitaWebhookSubscribeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vcita:subscribe {--event=} {--target_url=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register/subscribe vcita webhooks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $event = $this->option('event');
        $target_url = $this->option('target_url');
        if(!$event || !$target_url) {
            if(!$event) $this->error("please given event!");
            if(!$target_url) $this->error("please given target_url!");
            return;
        }

        $response = \Http::vcita()->post('/platform/v1/webhook/subscribe', [
            'event' => $event,
            'target_url' => $target_url,
        ]);

        if($response->successful()) {
            $data = $response->json();
            $this->info("register subscription successfully!");
            return Command::SUCCESS;
        }
        return FALSE;

    }
}
