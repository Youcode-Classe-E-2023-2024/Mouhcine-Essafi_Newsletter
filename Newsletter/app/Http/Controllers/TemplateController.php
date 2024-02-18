<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMailToSubs;
use App\Models\Member;
use App\Models\Template;
// use App\Models\Upload;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // templates
        $templates = Template::all();

        // media
        $all_media = Media::all();
        // dd($all_media);
        // $all_media_array = [];
        // foreach ($all_media as $item) {
        //     $all_media_array[] = [
        //         'id' => $item->id,
        //         'name' => $item->name,
        //         'url' => $item->getMedia('images')->first()->getUrl()
        //     ];
        // }
//        dd($tms[3]->used_times);
        return view('redacteur.form_template', ['all_media' => $all_media, 'templates' => $templates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
       dd($request->input('content'));
        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required'
        ]);

        Template::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'creator_name' => Auth::user()->name,
        ]);

        return back()->with('success', 'Template stored successfully');

    }


    public function send_mail(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
//        dd($request->input('selected_media'));
        $media = Media::where('model_id', $request->input('selected_media'))->first();
//        dd($media->model_id);
        $file_name = $media->file_name;
        $file_id = $media->id;

        $tmp = Template::find($request->input('template_selected'));
        $template = $tmp->content;

        $subs = Member::where('status', 'suscribed')->get();

        foreach ($subs as $sub) {
            Mail::to($sub->email)->send(new SendMailToSubs($template, $file_name, $file_id));
        }
        $tmp->used_times++;
        $tmp->save();
        return redirect('dashboard')->with('success', 'Mail is sent to all the subscribers successfully !!!');
    }

    public function delete_template(Request $request): \Illuminate\Http\RedirectResponse
    {
        Template::destroy($request->tmp_id);
        return back()->with('success', 'Template deleted successfully');
    }


//     public function download_template(Request $request)
//     {

// //        dd($request->tmp_id);

//         $tmp = Template::find($request->tmp_id);
//         $options = new Options();
//         $options->set('isHtml5ParserEnabled', true);
// //        dd($tmp->content);
//         $dompdf = new Dompdf($options);
//         $dompdf->loadHtml($tmp->content);

//         try {
//             $dompdf->setPaper('a4', 'landscape');
//             $dompdf->render();
//             $dompdf->stream($tmp->title.'.pdf');
//         } catch (\Exception $e) {
//             dd($e->getMessage());
//         }

//     }
}