<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use App\Models\OrderDocument;
use Illuminate\Http\Request;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function profile(Request $request, OrderDocument $orderDocument)
    {
        $document = $orderDocument->document;
        return view('document.template_document', [ 'orderDocument' => $orderDocument, 'document'=>$document ]);
    }
    
    public function index(Request $request)
    {
        $allDocumentsList = Document::latest();
        $documents = $allDocumentsList->get();
        $documentsCount = Document::latest()->count();
        // $locations = Service::loadLocations($allServicesList);
        // $categories = Service::loadCategories($allServicesList);
        // $filteredServices = (new ServiceFilters($request))->apply($allServicesList);
        // if (!is_null($filteredServices)) {
        //     $services = $filteredServices;
        //     $servicesCount = collect($filteredServices)->count();
        // } else {
        //     $services = $allServicesList->paginate();
        //     $servicesCount = Service::latest()->count();
        // }
        // return view('services.index', compact('documents', 'categories', 'services', 'servicesCount'));
        return view('document.flip', compact('documents', 'documentsCount'));
    }




    public function configdocuments(Request $request, Document $document)
    {
        $form = json_decode( $document->json_form );
        return view('document.configdocument', ['document' => $document, 'form'=>$form ]);    
    }
    
    public function configdata(Request $request, Document $document)
    {
        //$document = Document::find(1);
        $data = $request->all();
        $data['today']= date('d-m-Y');
        session(['document' => $data]);
        return view('document.template_document', ['document'=>$document]);
    }
    
    public function configdata2(Document $document, OrderDocument $order)
    {
        if( $this->hasDocumentOrdered($order, $document ) )
        {
            $template = $document->json_template;
            $php = \Blade::compileString($template);
            $data = json_decode( $order->document_data, true );
            $php = render($php, ['data'=>$data ]);
        }
        else
        {
            $data =  session('document');
            $template = $document->json_template_excerpt;
            $php = \Blade::compileString($template);
            $php = render($php, ['data'=>$data ]);
            $php = $php . " " . "<div><img src='http://sbscdemo.com/blur.jpg' /></div>";
        }

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf( $options );
        $dompdf->loadHtml( $php );
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        
        $content = $dompdf->output();
        
        return response($content)
            ->header('Content-Type', 'application/pdf')
            ->header('filename', "filename.pdf")
            ->header('Content-Disposition', 'inline');
    }
    
    
    public function create()
    {
        return view('document.create');
    }

    public function show(Document $document)
    {
        $reviews = $document->reviews()->latest()->paginate();
        $reviewsCount = $document->reviews()->count();
        //dd( $document );
        $pages = collect();
        if (!is_null($document))
            $pages = $document->previewPages;
        //dd( $previewPages->count() );
        $category = $document->category;
        $related_documents = $category->documents()
                                        ->get()
                                        ->shuffle()
                                        ->splice(0, 4);


        return view('document.show', compact('document', 'reviews', 'reviewsCount', 'pages', 'related_documents'));
    }

    public function download($document)
    {
        $name = "file/documents/" . $document;
        $documentPdf = public_path($name);

        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($name));
        ob_clean();
        flush();
        readfile( $documentPdf ); //showing the path to the server where the file is to be download
        exit;
    }
    
    public function hasDocumentOrdered($order, $document)
    {
        return (!is_null($order)) && Auth::check() && $order->confirm( $document, auth()->user()->id );
    }
}


function render($__php, $__data)
{
    $obLevel = ob_get_level();
    ob_start();
    extract($__data, EXTR_SKIP);
    try {
        eval('?' . '>' . $__php);
    } catch (Exception $e) {
        while (ob_get_level() > $obLevel) ob_end_clean();
        throw $e;
    } catch (Throwable $e) {
        while (ob_get_level() > $obLevel) ob_end_clean();
        throw new FatalThrowableError($e);
    }
    return ob_get_clean();
}

