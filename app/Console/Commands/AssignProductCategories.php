<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class AssignProductCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:assign-categories';

    /**dd
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign categories to products interactively';

    /**
     * The categories array.
     *
     * @var array
     */
    protected $categories = [
        1 => 'Stat Boosters',
        2 => 'Charms of the Heart',
        3 => 'Fortune Flasks',
        4 => 'Warding & Defense',
        5 => 'Mystic Mind',
        6 => 'Chaos & Mischief',
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $this->info("Product: {$product->name}");
            $this->info("Description: {$product->description}");
            $this->info("Current Category: " . ($product->category ? $this->categories[$product->category] : 'None'));
            foreach ($this->categories as $num => $cat) {
                $this->line("  $num - $cat");
            }
            $choice = $this->ask('Enter the number for the category (leave blank to skip)', $product->category);
            if ($choice && isset($this->categories[$choice])) {
                $product->category = $choice;
                $product->save();
                $this->info("Assigned to: {$this->categories[$choice]}");
            } else {
                $this->info("Skipped.");
            }
            $this->line(str_repeat('-', 40));
        }

        $this->info('Category assignment complete!');
    }
}
