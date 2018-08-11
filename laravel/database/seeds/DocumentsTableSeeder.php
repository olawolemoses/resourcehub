<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = App\Models\Category::all();
        foreach($categories as $category)
            factory(App\Models\Document::class, 50)->create(['category_id' => $category->id])->each(function ($document) {
                $document->reviews()
                    ->saveMany(factory(App\Models\BookReview::class, 5)
                        ->create([
                            'document_id' => $document->id
                        ]));
            });
        $documents = App\Models\Document::all();
        foreach( $documents as $document)
        {
            for($i = 1; $i <= $document->no_of_pages; $i++)
            {
                $previewPage = new App\Models\PreviewPages([
                    'document_id' => $document->id,
                    'page_num' => $i,
                    'page_preview_file' => sprintf('page_%s.jpg', $i),
                ]);
                $previewPage->save();
            }
        }
    }
}
