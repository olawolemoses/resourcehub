<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Document;
use App\Models\PreviewPages;

class FlipController extends Controller
{
    public function index(Document $document)
    {
        $previewPages = $document->previewPages();
        $pages = $previewPages->get()->pluck('page_preview_file');

        //dd($pages );
        return view('flip.index', compact('pages', 'document'));
    }

    public function create()
    {
        return view('flip.create');
    }

    public function store( Request $request )
    {
        //dd( $request->all() );
        $document = new Document;
        $document->merchant_id = $request->input('merchant_id');
        $document->title = $request->input('title');
        $document->description = $request->input('description');
        $document->published = $request->input('published');
        $document->amount = $request->input('amount');
        $document->reading_time = $request->input('reading_time');
        $document->author_name = $request->input('author_name');
        $document->isbn = $request->input('isbn');
        $document->tags = $request->input('tags');

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $photo = $request->file('photo');
            $ext = $photo->extension();
            $filename = "document_profile_pic_" . uniqid() . "." . $ext;
            $path = $photo->move(public_path() . "/file/documents/uploaded/", $filename);
            $document->photo = $filename;
        }

        $pages = [];
        $documentPdf = '';
        if ($request->hasFile('filename') && $request->file('filename')->isValid()) 
        {
            $pdfFile = $request->file('filename');
            $ext = $pdfFile->extension();
            $filename = "document_files_" . uniqid() . "." . $ext;
            $documentPdf = public_path() . "/file/documents/uploaded/" . $filename;
            $path = $pdfFile->move(public_path() . "/file/documents/uploaded/", $filename);
            $document->filename = $filename;
        }

        $document->no_of_pages = 1;
        $document->save();
        $pages = $this->createPreviewPagesBlurring($document, $documentPdf);
        $document->no_of_pages = count($pages);
        $document->save();
        // dd( $pages );
        return redirect()->route('flip', ['document' => $document]);
    }

    public function createPreviewPagesBlurring($document, $documentPdf)
    {
        ini_set('max_execution_time', 300);
                // configure with favored image driver (gd by default)
        Image::configure(array('driver' => 'imagick'));
        //$document = Document::find( $id );
        // $documentPdf = "file/documents/" . $document->filename;
        // //$samplePdf = 'file/sample.pdf';
        // $documentPdf = public_path($documentPdf);
        $pdf = new \Spatie\PdfToImage\Pdf($documentPdf);
        $numberOfPages = $pdf->getNumberOfPages(); //returns an int
        $firstPage = 1;
        $firstPdfPage = sprintf('%s.jpg', md5(microtime()));
        $firstPdfFilename = '/file/documents/' . $firstPdfPage;
        $pages[] = $firstPdfFilename;
        $firstPdfFilename = public_path($firstPdfFilename);
        $pdf->setOutputFormat('jpg')->saveImage($firstPdfFilename);

        $previewPages = PreviewPages::create([
            'document_id' => $document->id,
            'page_num' => $firstPage,
            'page_preview_file' => $firstPdfPage
        ]);
        for ($page = $firstPage + 1; $page <= $numberOfPages; $page++) 
        {
            $previewPage = new PreviewPages;
            $previewPage->document_id = $document->id;
            $previewPage->page_num = $page;
            $previewPage->page_preview_file = sprintf('%s.jpg', md5(microtime()));
            $varPdfPage = '/file/documents/' . $previewPage->page_preview_file;
            $pages[] = $varPdfPage;
            $varPdfPage = public_path($varPdfPage);
            $pdf->setPage($page)
                ->setOutputFormat('jpg')
                ->setCompressionQuality(50)
                ->saveImage($varPdfPage);
            $img = Image::make($varPdfPage);
            // apply slight blur filter
            $img->blur();
            // apply stronger blur
            $img->blur(13);
            $img->save($varPdfPage);
            $previewPage->save();
        }
        return $pages;
    }
}
