<?php
/**
 * Created by PhpStorm.
 * User: desarrollador
 * Date: 16/12/24
 * Time: 13:38
 */

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreComisionRequest;
use App\Http\Resources\ComisionCollection;
use App\Http\Resources\ComisionResource;
use App\Models\Comision;
use App\Repository\ComisionRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    private  $comisionRepository;

    public function __construct(ComisionRepository $comisionRepository)
    {
        $this->comisionRepository = $comisionRepository;
    }

    public function index(Request $request){
        try {
            $params = $request->query->all();
            $comisiones = $this->comisionRepository->findAll($params);
            return ApiResponse::success( new ComisionCollection($comisiones));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function store(StoreComisionRequest $request){
        try {
            $datos = $request->validated();
            $datos['monto']=10;
            $parametro = new ComisionResource(Comision::create($datos));
            return ApiResponse::success($parametro);
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }


    public function pdf(Comision $comision){
        try {
            $comision->conductor;
            $data = [
                'title'=>'COMISION JOBI',
                'logo'=>$this->getLogoBase64(),
                'fechaHoraActual'=>Carbon::now()->format('d/m/Y H:i:s'),
                'comision'=>new ComisionResource($comision)
            ];
            //return view('pdf.presupuesto',$data);
            $pdf = Pdf::loadView('pdf.comision',$data);
            $pdf->setPaper('letter');
//            $pdf->output();
//            $domPdf = $pdf->getDomPDF();
//            $canvas = $domPdf->get_canvas();
//            $canvas->page_text(10, 10, "P {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);
            return $pdf->download("comision_$comision->codigo.pdf");
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function getLogoBase64(){
        $imagePath = public_path('image/logo_jobi_negro.webp');
        $base64Uri = '';
        if (file_exists($imagePath)) {
            $imageContent = file_get_contents($imagePath);
            $base64Image = base64_encode($imageContent);
            $mime = mime_content_type($imagePath);
            $base64Uri = 'data:' . $mime . ';base64,' . $base64Image;
        }
        return $base64Uri;
    }
}