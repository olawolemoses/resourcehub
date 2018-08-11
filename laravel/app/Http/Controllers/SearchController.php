<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\Document;
use \DB;
use App\Models\Ad;
use App\ServiceFilters;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\Debug\Exception\FatalThrowableError;


class SearchController extends Controller
{
    public function findalawyer()
    {
        $alphas = range('A', 'Z');

        $arrs = []; 
        
        foreach( $alphas as $alpha)
        {
            $count = Category::where('category_name', 'like', $alpha . '%')->count();
            
            if( $count > 0)
                $arrs[$alpha] = Category::where('category_name', 'like', $alpha . '%')->get();
                
        }
        
        return view('search.findalawyer', ['arrs' => $arrs]);    
    }
    
    public function searchlawyer(Request $request)
    {
        $q = $request->input('search');
        
        $searchService = $this->getService($q);
               
        $locations = Service::loadLocations($searchService);
        
        $categories = Service::loadCategories($searchService);
        
        $services = (new ServiceFilters( $request ))->apply($searchService);
        
        $servicesCount = count($services);
        $resultads =  Ad::searchAds();
        
        //dd( $servicesCount );
        
        return view('search.searchresults', ['q'=> $q, 'services' => $services, 'locations' => $locations, 'categories' => $categories,'resultads'=>$resultads ]);    
    }
    
    public function legaldocuments(Request $request)
    {
                
        $documents = Document::orderBy('title', 'desc')->get();
        
        dd( $documents );
        
        //return view('search.searchresults', ['services' => $services]);    
    }
    
    public function configdocuments(Request $request)
    {
        $document = Document::find(1);
        
        // $form = [
        //     ["type"=>"header","subtype"=>"h1","label"=>"Header"],
        //     ["type"=>"text","label"=>"Customer Name","className"=>"form-control","name"=>"text-1530090668809","subtype"=>"text"],
        //     ["type"=>"text","label"=>"Customer Phone Number","className"=>"form-control","name"=>"text-1530090709113","subtype"=>"text"],
        //     ["type"=>"button","label"=>"Submit","subtype"=>"button","className"=>"btn btn-primary","name"=>"button-1530090739408","style"=>"primary"]
        // ];
        
        // $document->json_form = json_encode( $form );
        // $document->save();
        
        $form = json_decode( $document->json_form );
        
        return view('document.configdocument', ['document' => $document, 'form'=>$form ]);    
    }
    
    public function configdata(Request $request, Document $document)
    {
        $document = Document::find(1);
        $data = $request->all();
        $template = $document->json_template;
        $php = \Blade::compileString($template);
        $php = render($php, ['data'=>$data ]);
        return view('document.template_document', ['php' => $php, 'document'=>$document]);
    }
    
    public function test()
    {
        // configure with favored image driver (gd by default)
        Image::configure(array('driver' => 'imagick'));
        $samplePdf = public_path('file/sample.pdf');
        $pdf = new \Spatie\PdfToImage\Pdf( $samplePdf );
        $numberOfPages = $pdf->getNumberOfPages(); //returns an int
        $firstPage = 1;
        $firstPdfPage = sprintf('/file/Page_%s.png', $firstPage);
        $pages[] = $firstPdfPage;
        $firstPdfPage = public_path($firstPdfPage );
        $pdf->setOutputFormat('png')->saveImage($firstPdfPage);
        
        for($i = $firstPage+1; $i <= $numberOfPages; $i++)
        {
            $varPdfPage = sprintf('/file/Page_%s.png', $i);
            $pages[] = $varPdfPage;
            $varPdfPage = public_path($varPdfPage);
            $pdf->setPage( $i )
                ->setOutputFormat('png')
                ->saveImage($varPdfPage);
            $img = Image::make($varPdfPage);
            // apply slight blur filter
            $img->blur();
            // apply stronger blur
            $img->blur(20);
            $img->save($varPdfPage);
        }
        return view('flip.index', compact('pages'));
        //return Service::tagsList();
    }

    public function index(Request $request)
    {
        //$locations = DB::table('merchants')->select('state', DB::raw('count(state) as count'))->groupBy('state')->orderBy('count', 'desc')->get();
        $location = $request->query('location') ?? '';
        $_token = $request->query('_token') ?? '';
        // http://localhost:8000/search?_token=p9AjW0AceQG1aXLMABdXn9Vt2uEHiEGf8pACZCno&search=business&location=&page=2
        // http://localhost:8000/?search=business&location=&page=1
        // $categories = DB::table('services')
        //                 ->join('category', 'category.id', '=', 'services.category_id')
        //                 ->select('category_name', DB::raw('count(category_name) as count'))->groupBy('category_name')
        //                 ->orderBy('count', 'desc')
        //                 ->get();

        //dd($locations);
        // foreach($locations as $location)
        //     echo $location['state'];
        //$services = $searchService->paginate(15);
        //$services = $searchService->get();
        $q = request()->input('search');
        $searchService = $this->getService($q);
        $locations = Service::loadLocations($searchService);
        $categories = Service::loadCategories($searchService);
        $services = (new ServiceFilters( $request ))->apply($searchService);
        //dd( $services );
        $servicesCount = count($services);
        return view('search.index', compact('services', '_token', 'location', 'servicesCount', 'q', 'locations', 'categories'));
    }

    protected function getService($q)
    {
        $searchService = Service::search($q);
        return $searchService;
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
